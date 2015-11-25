@extends('template.template')

@section('content')
    {{--<h1>Bem Vindo ao Index</h1>--}}

    @section('title')
        <h3><span class="glyphicon glyphicon-envelope"></span> {!! $title !!}</h3>
    @endsection
<div class="container-fluid bg-grey">
    <h2 class="text-center">&nbsp;</h2>
    <div class="row">
        <div class="col-sm-5">
            <p>Universidade Luterana do Brasil.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Ji-Paraná-RO</p>
            <p><span class="glyphicon glyphicon-phone"></span> 069 3416-3111</p>
            <p><span class="glyphicon glyphicon-envelope"></span> email@email.com</p>
        </div>
        <div class="col-sm-7">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="nome" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comentário" rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-info pull-right" type="submit"><span class="glyphicon glyphicon-send"></span> Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection