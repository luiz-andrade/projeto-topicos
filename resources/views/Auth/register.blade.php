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

    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Cadastrar Login de acesso</h3>
        </div>
        <div class="panel-body">
            <form method="POST" action="/auth/register">
                {!! csrf_field() !!}

                <div>
                    Name
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>

                <div>
                    Email
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div>
                    Password
                    <input type="password" name="password">
                </div>

                <div>
                    Confirmar Senha
                    <input type="password" name="password_confirmation">
                </div>

                <div>
                    <button type="submit">Register</button>
                </div>
            </form>

        </div>
    </div>

</div>
<div class="col-sm-4"></div>


</body>
</html>