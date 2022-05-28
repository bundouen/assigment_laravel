<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>
  {{-- <title>{{ config('app.name', 'E-Shop') }}</title> --}}


  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  {{-- Google font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


  <!-- CSS Files -->

  
  <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

  <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">


  <!-- jquery -->
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  --}}
  <script src="{{ asset('frontend/js/query-3.6.0.min.js') }}"></script>
</head>

<body class="g-sidenav-show  bg-gray-200 ">
  @include('layouts.inc.frontnavbar')
  <main class="main-content d-flex flex-column min-vh-100 border-radius-lg ">
    <div class="container-fluid py-3">
      @yield('content')
    </div>

  </main>

  <!--   Core JS Files   -->


  <script src="{{ asset('frontend/js/query-3.6.0.min.js') }}"></script>

  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('frontend/js/custom.js') }}"></script>

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