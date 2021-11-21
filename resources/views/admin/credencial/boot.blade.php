<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMAC</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet"
        href="{{ asset('css/fonts_google.css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!--   <link rel="shortcut icon" href="{{ asset('favicons/favicon.png') }}">-->
    <link href="{{ asset('css/innovacion.tuxtla.css') }}" rel="stylesheet" type="text/css">


</head>

<body>
    <div class="container my-4">
        <div class="main d-flex">
            <div class="form col-md-10">
                <form action="">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" value="Hola mundo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                </form>
            </div>

            <div class="side col-md-2">
                <img src="" alt="img-side">
            </div>
        </div>
    </div>

    <script src="{{ asset('js/innovacion.tuxtla.js') }}"></script>

</body>

</html>
