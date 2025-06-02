@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
@if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('build/.vite/manifest.json')))
@vite([
  'resources/assets/vendor/scss/pages/page-auth.scss'
])
@else
<!-- Fallback CSS when Vite assets are not available -->
<style>
  .container-xxl {
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 15px;
  }
  .authentication-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 20px 0;
  }
  .authentication-basic {
    background: #f8f9fa;
  }
  .authentication-inner {
    width: 100%;
    max-width: 400px;
  }
  .card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border: 1px solid #e3e6f0;
  }
  .px-sm-6 {
    padding-left: 3rem;
    padding-right: 3rem;
  }
  .card-body {
    padding: 2rem;
  }
  .app-brand {
    text-align: center;
    margin-bottom: 2rem;
  }
  .mb-6 {
    margin-bottom: 2rem;
  }
  .form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: #495057;
  }
  .form-control {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ced4da;
    border-radius: 0.375rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-image: none;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
  .form-control:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }
  .btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.375rem;
    text-decoration: none;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
  .btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
  }
  .btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
  }
  .d-grid {
    display: grid;
  }
  .w-100 {
    width: 100%;
  }
  .text-center {
    text-align: center;
  }
  .mt-4 {
    margin-top: 1.5rem;
  }
  .text-muted {
    color: #6c757d;
  }
  .alert {
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.375rem;
  }
  .alert-warning {
    color: #856404;
    background-color: #fff3cd;
    border-color: #ffeaa7;
  }
</style>
@endif
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card px-sm-6 px-0">
        <div class="card-body">
          @if(!file_exists(public_path('build/manifest.json')) && !file_exists(public_path('build/.vite/manifest.json')))
          <div class="alert alert-warning">
            <strong>Debug Mode:</strong> Vite assets not found. Using fallback styles.
          </div>
          @endif
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <!-- <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span> -->
              <!-- <span class="app-brand-text demo text-heading fw-bold">{{config('variables.templateName')}}</span> -->
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1">Welcome to User Login</h4>
          <br>
           {{-- Validation bag error --}}
              @if($errors->has('login'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ $errors->first('login') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              {{-- Session error --}}
              @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
          <form class="mb-6" action="{{ route('login.perform') }}" method="POST"> 
          @csrf
            <div class="mb-6">
              <label for="email" class="form-label">Email or Username</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus>
            </div>
            <div class="mb-6 form-password-toggle">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="mb-6">
              <label for="warehouse" class="form-label">Select Warehouse</label>
              <select name="warehouse" id="warehouse" class="form-control" required>
                <option value="" disabled selected>Choose a warehouse</option>
                @foreach($warehouses as $warehouse)
                  <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-8">
              <div class="d-flex justify-content-between mt-8">
                <div class="form-check mb-0 ms-2">
                  <input class="form-check-input" type="checkbox" id="remember-me">
                  <label class="form-check-label" for="remember-me">
                    Remember Me
                  </label>
                </div>
                <a href="{{url('auth/forgot-password-basic')}}">
                  <span>Forgot Password?</span>
                </a>
              </div>
            </div>
            <div class="mb-6">
              <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
            </div>
          </form>

          <!-- <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{url('auth/register-basic')}}">
              <span>Create an account</span>
            </a>
          </p> -->
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
@endsection
