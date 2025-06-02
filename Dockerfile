# Use official PHP image with Apache
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    libpq-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    libssl-dev \
    default-mysql-client \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Configure Apache document root to point to public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy package files first for better caching
COPY package*.json ./

# Install JS dependencies first
RUN npm install

# Copy composer files for better caching
COPY composer.json composer.lock ./

# Install PHP dependencies via Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Copy Laravel files into the container
COPY . .

# Create .env file with required settings (will be overridden by environment variables)
RUN echo "APP_NAME=Laravel\n\
APP_ENV=production\n\
APP_KEY=\n\
APP_DEBUG=false\n\
APP_URL=http://localhost\n\
LOG_CHANNEL=stack\n\
LOG_DEPRECATIONS_CHANNEL=null\n\
LOG_LEVEL=debug\n\
DB_CONNECTION=mysql\n\
DB_HOST=nowk4scs88k0g0w8wck88gsc\n\
DB_PORT=3306\n\
DB_DATABASE=default\n\
DB_USERNAME=divinecare_user\n\
DB_PASSWORD=Wy2tD4dlmD6hFbKjQQBWHfuIY45PXjQvCDc750Hs5x14oRfTtF3qqs4j0dUIr5w8\n\
SESSION_DRIVER=file\n\
BROADCAST_DRIVER=log\n\
CACHE_DRIVER=file\n\
FILESYSTEM_DISK=local\n\
QUEUE_CONNECTION=sync\n\
SESSION_LIFETIME=120\n\
VITE_APP_NAME=\"\${APP_NAME}\"" > .env

# Generate application key
RUN php artisan key:generate --force

# Build assets with Vite
RUN npm run build

# Set permissions
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Enable Apache modules
RUN a2enmod rewrite headers

# Configure PHP with higher memory limits and longer execution time
RUN echo "memory_limit=256M\n\
upload_max_filesize=64M\n\
post_max_size=64M\n\
max_execution_time=300" > /usr/local/etc/php/conf.d/custom.ini

# Configure PHP
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Expose port
EXPOSE 80

# Startup script to ensure proper connection and handle environment variables
RUN echo '#!/bin/bash\n\
echo "Waiting for database connection..."\n\
sleep 10\n\
\n\
# Update APP_URL if provided via environment variable\n\
if [ ! -z "$APP_URL" ]; then\n\
    sed -i "s|APP_URL=.*|APP_URL=$APP_URL|g" /var/www/html/.env\n\
fi\n\
\n\
# Clear and cache configuration\n\
php artisan config:clear\n\
php artisan config:cache\n\
php artisan route:cache\n\
php artisan view:cache\n\
\n\
apache2-foreground' > /usr/local/bin/startup.sh && \
chmod +x /usr/local/bin/startup.sh

# Start Apache with our startup script
CMD ["/usr/local/bin/startup.sh"]
