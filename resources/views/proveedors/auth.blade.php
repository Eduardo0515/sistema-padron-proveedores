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
    <link rel="shortcut icon" href="{{{ asset('favicons/favicon.png') }}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    
    @include('proveedors.includes.include_header')

    <div >
        @yield('content')
    </div>

    <script src="{{ asset('js/innovacion.tuxtla.js') }}"></script>

</body>

</html>
