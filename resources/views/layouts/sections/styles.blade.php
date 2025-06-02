<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<!-- Always include fallback CSS first as a safety net -->
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
  
  .container-p-y {
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
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
  
  select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
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
  
  .d-flex {
    display: flex !important;
  }
  
  .justify-content-center {
    justify-content: center !important;
  }
  
  .justify-content-between {
    justify-content: space-between !important;
  }
  
  .w-100 {
    width: 100% !important;
  }
  
  .text-center {
    text-align: center !important;
  }
  
  .mb-0 { margin-bottom: 0 !important; }
  .mb-1 { margin-bottom: 0.25rem !important; }
  .mb-2 { margin-bottom: 0.5rem !important; }
  .mb-3 { margin-bottom: 1rem !important; }
  .mb-4 { margin-bottom: 1.5rem !important; }
  .mb-5 { margin-bottom: 3rem !important; }
  .mb-6 { margin-bottom: 3.5rem !important; }
  .mb-8 { margin-bottom: 5rem !important; }
  
  .mt-1 { margin-top: 0.25rem !important; }
  .mt-2 { margin-top: 0.5rem !important; }
  .mt-3 { margin-top: 1rem !important; }
  .mt-4 { margin-top: 1.5rem !important; }
  .mt-5 { margin-top: 3rem !important; }
  .mt-8 { margin-top: 5rem !important; }
  
  .ms-2 { margin-left: 0.5rem !important; }
  
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
    background-color: #fff3cd;
    border-color: #faebcc;
  }
  
  .alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
  }
  
  .alert-dismissible {
    padding-right: 4rem;
  }
  
  .btn-close {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    padding: 0.75rem 1.25rem;
    color: inherit;
    background: transparent;
    border: 0;
    font-size: 1.25rem;
    line-height: 1;
    opacity: 0.5;
    cursor: pointer;
  }
  
  .btn-close:hover {
    opacity: 0.75;
  }
  
  .fade {
    transition: opacity 0.15s linear;
  }
  
  .show {
    opacity: 1;
  }
  
  /* Form check styles */
  .form-check {
    display: block;
    min-height: 1.5rem;
    padding-left: 1.5em;
    margin-bottom: 0.125rem;
  }
  
  .form-check-input {
    width: 1em;
    height: 1em;
    margin-top: 0.25em;
    margin-left: -1.5em;
    vertical-align: top;
    background-color: #fff;
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    border: 1px solid rgba(0, 0, 0, 0.25);
    appearance: none;
    color-adjust: exact;
  }
  
  .form-check-input[type="checkbox"] {
    border-radius: 0.25em;
  }
  
  .form-check-input:checked {
    background-color: #696cff;
    border-color: #696cff;
  }
  
  .form-check-input:checked[type="checkbox"] {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='white'%3e%3cpath fill-rule='evenodd' d='M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z' clip-rule='evenodd'/%3e%3c/svg%3e");
  }
  
  .form-check-label {
    color: #697a8d;
    cursor: pointer;
  }
  
  /* Input group styles */
  .input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 100%;
  }
  
  .input-group-merge .form-control {
    position: relative;
    flex: 1 1 auto;
    width: 1%;
    min-width: 0;
  }
  
  .input-group-text {
    display: flex;
    align-items: center;
    padding: 0.4375rem 0.875rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.53;
    color: #697a8d;
    text-align: center;
    white-space: nowrap;
    background-color: #f5f5f9;
    border: 1px solid #d9dee3;
    border-radius: 0.375rem;
  }
  
  .input-group-merge .input-group-text {
    border-left: 0;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
  
  .input-group-merge .form-control {
    border-right: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }
  
  .cursor-pointer {
    cursor: pointer !important;
  }
  
  /* Icon styles */
  .bx {
    font-family: 'boxicons' !important;
    font-weight: normal;
    font-style: normal;
    font-variant: normal;
    line-height: 1;
    display: inline-block;
    text-transform: none;
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
  
  .bx-hide:before {
    content: "👁";
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
  
  /* Heading styles */
  h4 {
    margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 600;
    line-height: 1.2;
    color: #566a7f;
    font-size: 1.125rem;
  }
  
  /* Form password toggle */
  .form-password-toggle {
    position: relative;
  }
  
  /* Gap utility */
  .gap-2 {
    gap: 0.5rem !important;
  }
</style>

@if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('build/.vite/manifest.json')))
<!-- Try to load Vite assets if manifest exists -->
@vite(['resources/assets/vendor/fonts/boxicons.scss'])

<!-- Core CSS -->
@vite([
  'resources/assets/vendor/scss/core.scss',
  'resources/assets/vendor/scss/theme-default.scss',
  'resources/assets/css/demo.css'
])

<!-- Vendor Styles -->
@vite(['resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.scss'])

<!-- Add a small indicator that Vite assets are being attempted -->
<style>
  .vite-loading-indicator {
    position: fixed;
    top: 10px;
    right: 10px;
    background: #696cff;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 12px;
    z-index: 9999;
  }
</style>
<div class="vite-loading-indicator">Vite Assets Loading...</div>
@else
<!-- Manifest not found - using fallback only -->
<style>
  .fallback-indicator {
    position: fixed;
    top: 10px;
    right: 10px;
    background: #ff6b35;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 12px;
    z-index: 9999;
  }
</style>
<div class="fallback-indicator">Using Fallback CSS</div>
@endif

@yield('vendor-style')

<!-- Page Styles -->
@yield('page-style')
