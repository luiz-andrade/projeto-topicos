<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/img/favicon.ico">

    <title>Proposta TCC</title>

    <!-- Bootstrap core CSS -->
    {{--<link href="/assets/css/bootstrap.min.css" rel="stylesheet">--}}
    {!! Html::style('/assets/css/bootstrap.css') !!}

</head>

<body>

<div class="" style="box-shadow:2px 0px 21px #D9EDF7; background-color: #F7FAFC;" >
    <div class="container">
        <div class="col-sm-3">
            <a href="/">
                {!! Html::image('/assets/img/logo-si.png', '', ['class' => 'img-responsive', 'width' => '160px', 'height' => '90px']) !!}
            </a>
            {{--<img src="assets/img/logo-si.png" alt="" width="60px" height="40px">--}}
        </div>
        <div class="col-sm-9">
        <br />
            @include('template.menu')
        </div>
    <!--
        <div class="col-sm-3">
            {!! Html::image('/assets/img/logo-ulbra.png', '', ['class' => 'img-', 'width' => '80px', 'height' => '90px']) !!}
        </div>
        -->
    </div>
</div>

<div class="container">
{{-- style="background: #F5F5F5" --}}

    <!-- Main component for a primary marketing message or call to action -->
    <div class="">
        @yield('corpo')


        @section('content')

        @show
    </div>
</div> <!-- /container -->

<!-- Site footer -->
<div class="footer" style="box-shadow:0px -6px 5px #D9EDF7;  background-image: -webkit-linear-gradient(top, #ffffff 0%, #F6F6F6 47%, #ededed 100%);">
    <div class="container" style="padding: 5px">
    <footer class="text-center">
        <p>&copy; Ulbra 2015</p>
    </footer>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

</body>
</html>
