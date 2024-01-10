<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin-dashboard</title>
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
    
  </head>
  <body>
   
     
      <!-- partial:partials/_navbar.html -->
  @include('backend.dashboard.common.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.dashboard.common.sidebar')
        <!-- partial -->
      @yield('content')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
</div>

         @include('backend.dashboard.common.footer')
</div>
        </div>
    </div>
    
  </body>
</html>