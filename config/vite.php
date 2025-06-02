<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Vite Build Directory
    |--------------------------------------------------------------------------
    |
    | This value determines the "build directory" that will be used by Vite.
    | This is the directory where Vite will place the compiled assets and
    | the manifest file. This should match the "build.outDir" configuration
    | option in your "vite.config.js" file.
    |
    */

    'build_directory' => 'build',

    /*
    |--------------------------------------------------------------------------
    | Vite Manifest Path
    |--------------------------------------------------------------------------
    |
    | This value determines the path to the Vite manifest file within the
    | build directory. This should match the "build.manifest" configuration
    | option in your "vite.config.js" file.
    |
    */

    'manifest' => 'manifest.json',

    /*
    |--------------------------------------------------------------------------
    | Vite Hot File Path
    |--------------------------------------------------------------------------
    |
    | This value determines the path to the Vite "hot" file. The "hot" file
    | is a file that will be created by Vite when serving assets via the
    | Vite development server.
    |
    */

    'hot_file' => public_path('hot'),

    /*
    |--------------------------------------------------------------------------
    | Vite Development Server URL
    |--------------------------------------------------------------------------
    |
    | This value determines the URL that will be used to serve assets when
    | running the Vite development server. This should match the "server.host"
    | and "server.port" configuration options in your "vite.config.js" file.
    |
    */

    'dev_url' => env('VITE_DEV_SERVER_URL', 'http://localhost:5173'),

]; 