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

# Configure Apache to log to stdout/stderr for better debugging
RUN sed -ri \
    -e 's!^(\s*CustomLog)\s+\S+!\1 /proc/self/fd/1!g' \
    -e 's!^(\s*ErrorLog)\s+\S+!\1 /proc/self/fd/2!g' \
    /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf

# Copy Laravel files into the container first
COPY . .

# Copy package files and install JS dependencies
RUN npm install

# Install PHP dependencies via Composer (skip scripts initially)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev --no-scripts

# Create .env file with required settings (will be overridden by environment variables)
RUN echo "APP_NAME=Laravel\n\
APP_ENV=production\n\
APP_KEY=\n\
APP_DEBUG=true\n\
APP_URL=http://localhost\n\
LOG_CHANNEL=stderr\n\
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

# Run composer scripts now that artisan is available (with error handling)
RUN composer run-script post-autoload-dump || echo "Warning: post-autoload-dump script failed, continuing..."

# Build assets with Vite - ensure this happens and verify the output
RUN npm run build && \
    echo "Vite build completed. Checking manifest file..." && \
    ls -la public/build/ && \
    if [ ! -f "public/build/manifest.json" ]; then \
        echo "ERROR: Vite manifest.json not found after build!"; \
        exit 1; \
    else \
        echo "SUCCESS: Vite manifest.json found"; \
        cat public/build/manifest.json; \
    fi

# Create necessary directories and set proper permissions
RUN mkdir -p /var/www/html/storage/logs \
    && mkdir -p /var/www/html/storage/framework/cache \
    && mkdir -p /var/www/html/storage/framework/sessions \
    && mkdir -p /var/www/html/storage/framework/views \
    && mkdir -p /var/www/html/bootstrap/cache

# Set permissions for Laravel directories
RUN chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/public \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Enable Apache modules
RUN a2enmod rewrite headers

# Configure PHP with higher memory limits and longer execution time
RUN echo "memory_limit=256M\n\
upload_max_filesize=64M\n\
post_max_size=64M\n\
max_execution_time=300\n\
display_errors=On\n\
display_startup_errors=On\n\
log_errors=On\n\
error_log=/dev/stderr" > /usr/local/etc/php/conf.d/custom.ini

# Configure PHP
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Expose port
EXPOSE 80

# Startup script to ensure proper connection and handle environment variables
RUN echo '#!/bin/bash\n\
set -e\n\
\n\
echo "Starting Laravel application..."\n\
\n\
# Check if Vite manifest exists\n\
if [ ! -f "/var/www/html/public/build/manifest.json" ]; then\n\
    echo "ERROR: Vite manifest not found! Attempting to rebuild..."\n\
    cd /var/www/html\n\
    npm run build || echo "Vite build failed during startup"\n\
fi\n\
\n\
# Update APP_URL if provided via environment variable\n\
if [ ! -z "$APP_URL" ]; then\n\
    echo "Setting APP_URL to: $APP_URL"\n\
    sed -i "s|APP_URL=.*|APP_URL=$APP_URL|g" /var/www/html/.env\n\
fi\n\
\n\
# Wait for database connection\n\
echo "Waiting for database connection..."\n\
for i in {1..30}; do\n\
    if php artisan migrate:status > /dev/null 2>&1; then\n\
        echo "Database connection successful"\n\
        break\n\
    fi\n\
    echo "Waiting for database... ($i/30)"\n\
    sleep 2\n\
done\n\
\n\
# Clear and cache configuration\n\
echo "Clearing and caching configuration..."\n\
php artisan config:clear || echo "Config clear failed"\n\
php artisan config:cache || echo "Config cache failed"\n\
php artisan route:cache || echo "Route cache failed"\n\
php artisan view:cache || echo "View cache failed"\n\
\n\
# Test basic Laravel functionality\n\
echo "Testing Laravel application..."\n\
php artisan --version\n\
\n\
echo "Starting Apache..."\n\
apache2-foreground' > /usr/local/bin/startup.sh && \
chmod +x /usr/local/bin/startup.sh

# Start Apache with our startup script
CMD ["/usr/local/bin/startup.sh"]
