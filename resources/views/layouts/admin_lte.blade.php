<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMAC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/fonts_google.css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <link href="{{ asset('css/innovacion.tuxtla.css') }}" rel="stylesheet" type="text/css">

    @yield('content_css')
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.png') }}">

</head>
<body  class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  @include('layouts.includes.include_header') 
  <!-- Left side column. contains the logo and sidebar -->
  
  @include('layouts.includes.include_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.includes.include_footer')

  
</div>
<!-- ./wrapper -->
@yield('content_modals')
<script>
  var url_route="{{ url('/') }}"
</script>
<script src="{{ asset('js/innovacion.tuxtla.js') }}"></script>
@yield('content_js')
</body>
</html>
