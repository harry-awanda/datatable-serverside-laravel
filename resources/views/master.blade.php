<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simdik4 | Responsive Bootstrap 4 Admin Dashboard Template</title>
    
    <!-- Favicon -->
    
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backend.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  </head>
  <body class="  ">
    <!-- Wrapper Start -->
    <div class="wrapper">
      @include('includes._sidebar')
      @include('includes._navbar')
      <div class="content-page">
        @yield('content')
        <!-- Page end  -->
    </div>
  </div>
</div>
    <!-- Wrapper End-->
  <footer class="iq-footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            <li class="list-inline-item"><a href="#">Terms of Use</a></li>
          </ul>
        </div>
        <div class="col-lg-6 text-right">
          <span class="mr-1"><script>document.write(new Date().getFullYear())</script>©</span> <a href="#" class="">Webkit</a>.
        </div>
      </div>
    </div>
  </footer>
<!-- Backend Bundle JavaScript -->

  <script src="{{ asset('assets/js/backend-bundle.min.js') }}"></script>
  <!-- Table Treeview JavaScript -->
  <script src="{{ asset('assets/js/table-treeview.js') }}"></script>
  <!-- Chart Custom JavaScript -->
  <script src="{{ asset('assets/js/customizer.js') }}"></script>
  <!-- Chart Custom JavaScript -->
  <script async src="{{ asset('assets/js/chart-custom.js') }}"></script>
  <!-- Chart Custom JavaScript -->
  <script async src="{{ asset('assets/js/slider.js') }}"></script>
  <!-- app JavaScript -->
  <script src="{{ asset('assets/js/app.js') }}"></script>
  <script src="{{ asset('assets/vendor/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
  <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  @stack('scripts')
  </body>
</html>