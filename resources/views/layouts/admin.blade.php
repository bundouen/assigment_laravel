<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Shop</title>
    {{-- <title>{{ config('app.name', 'E-Shop') }}</title> --}}


    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet">
  

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- CSS Files -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body class="g-sidenav-show  bg-gray-200">
    
    @include('layouts.inc.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        @include('layouts.inc.adminnavbar')

        <div class="container-fluid py-4">

            @yield('content')

            @include('layouts.inc.adminfooter')

        </div>
    </main>
   
     <!--   Core JS Files   -->
  <script src="admin/js/popper.min.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>
  <script src="admin/js/perfect-scrollbar.min.js"></script>
  <script src="admin/js/smooth-scrollbar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="admin/js/material-dashboard.min.js?v=3.0.2"></script>
    @yield('script')
</body>
</html>
