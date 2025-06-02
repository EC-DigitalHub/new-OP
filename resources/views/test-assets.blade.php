<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asset Loading Test</title>
    
    <!-- Test Vite CSS loading -->
    @vite([
        'resources/assets/vendor/scss/core.scss',
        'resources/assets/vendor/scss/theme-default.scss',
        'resources/assets/vendor/scss/pages/page-auth.scss'
    ])
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <h4 class="mb-1">Asset Loading Test</h4>
                        <p>If you can see this styled properly, the assets are loading correctly.</p>
                        
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> CSS is loading properly.
                        </div>
                        
                        <div class="mb-6">
                            <label for="test-input" class="form-label">Test Input</label>
                            <input type="text" class="form-control" id="test-input" placeholder="Test input field">
                        </div>
                        
                        <button class="btn btn-primary d-grid w-100" type="button">Test Button</button>
                        
                        <hr>
                        
                        <h5>Debug Information:</h5>
                        <ul>
                            <li>APP_URL: {{ config('app.url') }}</li>
                            <li>APP_ENV: {{ config('app.env') }}</li>
                            <li>Manifest exists: {{ file_exists(public_path('build/manifest.json')) ? 'Yes' : 'No' }}</li>
                            <li>Build directory exists: {{ is_dir(public_path('build')) ? 'Yes' : 'No' }}</li>
                            <li>Assets directory exists: {{ is_dir(public_path('build/assets')) ? 'Yes' : 'No' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Test Vite JS loading -->
    @vite([
        'resources/assets/vendor/js/helpers.js',
        'resources/assets/js/config.js'
    ])
</body>
</html> 