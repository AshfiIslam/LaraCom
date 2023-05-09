<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Laravel') }}</title>

     
   <!-- Bootstrap Css -->
   <link href="{{asset('admin/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
   <!-- Icons Css -->
   <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
   <!-- App Css-->
   <link href="{{asset('admin/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

       @livewireStyles
</head>
<body>
   <div>
    @include('layouts.inc.admin.navbar')

    <div class="main-content">

        <div class="page-content">
    @yield('content')
        </div>
   </div>
   </div>

     <!-- JAVASCRIPT -->
     <script src="{{ asset('admin/libs/jquery/jquery.min.js')}}"></script>
     <script src="{{ asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{ asset('admin/libs/metismenu/metisMenu.min.js')}}"></script>
     <script src="{{ asset('admin/libs/simplebar/simplebar.min.js')}}admin/libs/simplebar/simplebar.min.js"></script>
     <script src="{{ asset('admin/libs/node-waves/waves.min.js')}}"></script>
    
     <!-- apexcharts -->
     <script src="{{ asset ('admin/libs/apexcharts/apexcharts.min.js')}}"></script>

     <script src="{{ asset ('admin/js/pages/dashboard.init.js')}}"></script>

     <!-- App js -->
     <script src="{{ asset ('admin/js/app.js')}}"></script>

    @livewireScripts

    @yield('scripts')
    @stack('script')
    {{-- @method('script') --}}


</body>
</html>