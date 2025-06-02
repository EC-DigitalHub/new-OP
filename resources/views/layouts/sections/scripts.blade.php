<!-- BEGIN: Vendor JS-->

@if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('build/.vite/manifest.json')))
@vite([
  'resources/assets/vendor/libs/jquery/jquery.js',
  'resources/assets/vendor/libs/popper/popper.js',
  'resources/assets/vendor/js/bootstrap.js',
  'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
  'resources/assets/vendor/js/menu.js'
])

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
@vite(['resources/assets/js/main.js'])
@else
<!-- Fallback JS when Vite assets are not available -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script>
  // Basic theme functionality fallback
  console.log('Using fallback JavaScript - Vite assets not available');
  
  // Basic form handling
  document.addEventListener('DOMContentLoaded', function() {
    // Add basic form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(function(form) {
      form.addEventListener('submit', function(e) {
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(function(field) {
          if (!field.value.trim()) {
            isValid = false;
            field.style.borderColor = '#dc3545';
          } else {
            field.style.borderColor = '#d9dee3';
          }
        });
        
        if (!isValid) {
          e.preventDefault();
          alert('Please fill in all required fields.');
        }
      });
    });
    
    // Basic focus handling for form controls
    const formControls = document.querySelectorAll('.form-control');
    formControls.forEach(function(control) {
      control.addEventListener('focus', function() {
        this.style.borderColor = '#696cff';
        this.style.boxShadow = '0 0 0 0.2rem rgba(105, 108, 255, 0.25)';
      });
      
      control.addEventListener('blur', function() {
        this.style.borderColor = '#d9dee3';
        this.style.boxShadow = 'none';
      });
    });
  });
</script>
@endif

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
