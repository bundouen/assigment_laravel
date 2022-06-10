<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Handicraft Shop</title>
  {{-- <title>{{ config('app.name', 'E-Shop') }}</title> --}}


  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet">


  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">



  <!-- CSS Files -->
  <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- jquery -->
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> --}}
  <script src="{{ asset('frontend/js/query-3.6.0.min.js') }}"></script>  
</head>

<body class="g-sidenav-show  bg-gray-200 ">

  @include('layouts.inc.sidebar')

  {{-- <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg "> --}}
    <main class="main-content d-flex flex-column min-vh-100 border-radius-lg ">

      @include('layouts.inc.adminnavbar')

      <div class="container-fluid py-4">
        @yield('content')
      </div>
      @include('layouts.inc.adminfooter')
    </main>

    <!--   Core JS Files   -->
    
    

    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{asset ('admin/js/smooth-scrollbar.min.js') }}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset ('admin/js/material-dashboard.min.js') }}"></script>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>



    @if (session('status'))
    <script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title:"{{ session('status') }}" ,
        showConfirmButton: false,
        timer: 1500
      })
    </script>
    @endif
    {{-- @if (session('error'))
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{  {{ session('error')  }}!",
        footer: '<a href="">Why do I have this issue?</a>' 
      })
    </script>
      
    @endif --}}

    @yield('script')
</body>

</html>