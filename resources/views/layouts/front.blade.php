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
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  
  
  
  <!-- CSS Files -->
    
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

    
   <!-- jquery -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    
</head>
<body class="g-sidenav-show  bg-gray-200 ">
  @include('layouts.inc.frontnavbar')
    <main class="main-content d-flex flex-column min-vh-100 border-radius-lg ">
        <div class="container-fluid py-2">
              @yield('content')  
        </div> 
        
    </main>
   
     <!--   Core JS Files   -->

  
  <script src="frontend/js/query-3.6.0.min.js"></script>

  <script src="frontend/js/bootstrap.bundle.min.js"></script>

  <script src="frontend/js/owl.carousel.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    
    @yield('scripts')
</body>
</html>
