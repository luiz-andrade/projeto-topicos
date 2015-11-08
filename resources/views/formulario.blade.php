@extends('template.template')

@section('content')

<h1>formulario  Erasmo..</h1>

<form action="formulario/adicionar" method="post" class="form-horizontal">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nome" id="nome" placeholder="nome">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Sign in</button>
        </div>
    </div>
</form>

@endsection