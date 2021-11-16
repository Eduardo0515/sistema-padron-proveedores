<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIREVIG</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/fonts_google.css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    
    <link href="{{ asset('css/innovacion.tuxtla.css') }}" rel="stylesheet" type="text/css"" media="all">

    @yield('content_css')

</head>
<body>

    @yield('content')
</body>
</html>
