<!DOCTYPE html>
<html lang="pt_Br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login de acesso</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="jumbotron">

    <div class="col-sm-4"></div>
    <div class="col-sm-4">

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Login de acesso</h3>
            </div>
            <div class="panel-body">

                @include('partials.list-errors')

                <form method="POST" action="/auth/login" class="form-horizontal">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="email" class="control-label col-sm-2">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email"value="{!! old('email') !!}" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label col-sm-2">Senha</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" class="form-control btn-block">
                        </div>
                    </div>

                    <div>
                        {{--<input type="checkbox" name="remember"> Remember Me--}}
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info">Entrar</button>
                        <a href="/auth/register">Registrar</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-sm-4"></div>


</body>
</html>