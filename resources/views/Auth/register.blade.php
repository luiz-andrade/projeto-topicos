<!DOCTYPE html>
<html lang="pt_Br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastrar Login de acesso</title>

    <!-- Bootstrap core CSS.-->
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

            @include('partials.list-errors')

            <form method="POST" action="/auth/register" class="form-horizontal">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name" class="control-label col-sm-2">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name" title="Digite seu nome completo" class="form-control" autofocus required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="email" title="Digite um email válido que será usando para acessar o sistema" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label col-sm-2">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label col-sm-2">Confirmar senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" id="password_confirmation" title="Repita a senha digitada acima" class="form-control" required>
                    </div>
                </div>
                
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <a href="/auth/login/" class="btn btn-danger">Voltar</a>
                </div>
            </form>

        </div>
    </div>

</div>
<div class="col-sm-4"></div>


</body>
</html>