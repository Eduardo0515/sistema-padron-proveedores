<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMAC</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="{{ asset('css/fonts_google.css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <link href="{{ asset('css/innovacion.tuxtla.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{{ asset('favicons/favicon.png') }}}">
</head>

<body class="hold-transition">

    <main class="py-4">
        @yield('content')
    </main>

    <script src="{{ asset('js/innovacion.tuxtla.js') }}"></script>
    <script type="text/javascript">
        let divRazonSocial = document.getElementById('div-razon');
        divRazonSocial.style = "display:none";
        
        $('#select_tipo_persona').on('change', function() {
            let conceptName = $('#select_tipo_persona').find(":selected").text();
            if(conceptName.trim() == 'Persona moral' | conceptName.trim() == 'Moral'){
                divRazonSocial.style = "display:block";
            }else{
                divRazonSocial.style = "display:none";
            }
        });
    </script>
</body>

</html>
