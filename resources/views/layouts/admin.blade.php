<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link id="pagestyle" href="{{ asset('admin/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!--   Core JS Files   -->
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/chartjs.min.js') }}"></script>
</head>
<body>

   <div class="wrapper">
    @include('layouts/inc/sidebar')
    <!-- @include('layouts/inc/adminnav')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   
    @yeild('content')
  </main> -->

   </div>
   <!-- @include('layouts/inc/adminfooter') -->
</body>
</html>

@yeild('scripts')
