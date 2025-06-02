<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

@if(file_exists(public_path('build/manifest.json')))
@vite(['resources/assets/vendor/fonts/boxicons.scss'])

<!-- Core CSS -->
@vite([
  'resources/assets/vendor/scss/core.scss',
  'resources/assets/vendor/scss/theme-default.scss',
  'resources/assets/css/demo.css'
])

<!-- Vendor Styles -->
@vite(['resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.scss'])
@else
<!-- Fallback CSS when Vite assets are not available -->
<style>
  /* Basic reset and typography */
  * {
    box-sizing: border-box;
  }
  
  body {
    font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
    font-size: 0.9375rem;
    line-height: 1.53;
    color: #697a8d;
    background-color: #f5f5f9;
    margin: 0;
    padding: 0;
  }
  
  /* Basic layout styles */
  .container-xxl {
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 15px;
  }
  
  /* Card styles */
  .card {
    background: #fff;
    border-radius: 0.375rem;
    box-shadow: 0 0.125rem 0.25rem rgba(165, 163, 174, 0.3);
    border: 0;
    margin-bottom: 1.5rem;
  }
  
  .card-body {
    padding: 1.5rem;
  }
  
  /* Form styles */
  .form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: #566a7f;
    font-size: 0.8125rem;
  }
  
  .form-control {
    display: block;
    width: 100%;
    padding: 0.4375rem 0.875rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.53;
    color: #697a8d;
    background-color: #fff;
    background-image: none;
    border: 1px solid #d9dee3;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
  
  .form-control:focus {
    color: #697a8d;
    background-color: #fff;
    border-color: #696cff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(105, 108, 255, 0.25);
  }
  
  /* Button styles */
  .btn {
    display: inline-block;
    font-weight: 500;
    line-height: 1.53;
    color: #697a8d;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.4375rem 1.25rem;
    font-size: 0.9375rem;
    border-radius: 0.375rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
  
  .btn-primary {
    color: #fff;
    background-color: #696cff;
    border-color: #696cff;
  }
  
  .btn-primary:hover {
    color: #fff;
    background-color: #5f61e6;
    border-color: #5a5cd6;
  }
  
  /* Utility classes */
  .d-grid {
    display: grid !important;
  }
  
  .w-100 {
    width: 100% !important;
  }
  
  .text-center {
    text-align: center !important;
  }
  
  .mb-1 { margin-bottom: 0.25rem !important; }
  .mb-2 { margin-bottom: 0.5rem !important; }
  .mb-3 { margin-bottom: 1rem !important; }
  .mb-4 { margin-bottom: 1.5rem !important; }
  .mb-5 { margin-bottom: 3rem !important; }
  .mb-6 { margin-bottom: 3.5rem !important; }
  
  .mt-1 { margin-top: 0.25rem !important; }
  .mt-2 { margin-top: 0.5rem !important; }
  .mt-3 { margin-top: 1rem !important; }
  .mt-4 { margin-top: 1.5rem !important; }
  .mt-5 { margin-top: 3rem !important; }
  
  /* Authentication specific styles */
  .authentication-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 1.5rem 0;
  }
  
  .authentication-basic {
    background-color: #f5f5f9;
  }
  
  .authentication-inner {
    width: 100%;
    max-width: 25rem;
  }
  
  .px-sm-6 {
    padding-left: 3rem !important;
    padding-right: 3rem !important;
  }
  
  .px-0 {
    padding-left: 0 !important;
    padding-right: 0 !important;
  }
  
  /* App brand styles */
  .app-brand {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
  }
  
  .app-brand-link {
    text-decoration: none;
    color: #697a8d;
  }
  
  .app-brand-logo img {
    height: 2rem;
  }
  
  .app-brand-text {
    font-size: 1.25rem;
    font-weight: 600;
    margin-left: 0.5rem;
  }
  
  /* Alert styles */
  .alert {
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.375rem;
  }
  
  .alert-warning {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-color: #faebcc;
  }
  
  /* Link styles */
  a {
    color: #696cff;
    text-decoration: none;
  }
  
  a:hover {
    color: #5f61e6;
    text-decoration: underline;
  }
  
  /* Small text */
  .text-muted {
    color: #a8b1bb !important;
  }
  
  small {
    font-size: 0.75rem;
  }
</style>
@endif

@yield('vendor-style')

<!-- Page Styles -->
@yield('page-style')
