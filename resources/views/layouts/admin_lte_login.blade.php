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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><img src="{{asset('img/logo.png')}}" alt="" width="200px" /> </a>
  </div>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <b>Iniciar Sesión</b>
    </div>
    <div class="card-body">
    @yield('content')
    </div>
  </div>
</div>



<script src="{{ asset('js/innovacion.tuxtla.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
        <script src="{{ asset('js/login.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.fa-eye').on('click', function(){
                    if($('#password').prop('type') == 'password'){
                        $('#password').prop('type', 'text');
                    }else{
                        $('#password').prop('type', 'password');
                    }
                });
            });
        </script>
</body>
</html>
