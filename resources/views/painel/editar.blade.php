@extends('template.template')

@section('content')

    @section('title')
        <h3>{!! $title !!}</h3>
    @endsection

@if(count($errors) > 0)
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach($errors->all() as $message)
            <p class="text-danger">{!! $message !!}</p>
        @endforeach
    </div>
@endif

{{--{!! Form::open(['url' => 'propostatcc/editar/'.$proposta->id]) !!}--}}
{!! Form::model($proposta, ['url' => 'propostatcc/editar/'. $proposta->id]) !!}
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span class="glyphicon glyphicon-plus-sign"></span> Dados Pessoais
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">

                <div class="form-group">
                    {!! Form::label('nome', 'Nome do formando') !!}
                    {!! Form::text('nome', null, ['class' => 'form-control alert-info']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('orientador', 'Sugest&atilde;o para orientador') !!}
                    {!! Form::text('orientador', null, ['class' => 'form-control alert-info']) !!}
                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span class="glyphicon glyphicon-plus-sign"></span> Do TCC
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('titulo', 'Titulo', ['class' => 'control-label']) !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control alert-info alert-info']) !!}

                    {!! Form::label('subtitulo', 'Subtitulo', ['class' => 'control-label']) !!}
                    {!! Form::text('subtitulo', null, ['class' => 'form-control alert-info']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('local', 'Local', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                    {!! Form::text('local', null, ['class' => 'form-control alert-info']) !!}
                    </div>

                    {!! Form::label('ano', 'Ano', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('ano', null, ['class' => 'form-control alert-info']) !!}
                    </div>
                </div>

                <hr />

                <div class="form-group">
                    {!! Form::label('finalidade', 'Finalidade', ['class' => 'control-label']) !!}
                    {!! Form::textarea('finalidade', null, ['class' => 'form-control alert-info']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('objetivos', 'Objetivos', ['class' => 'control-label']) !!}
                    {!! Form::textarea('objetivos', null, ['class' => 'form-control alert-info']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('problematizacao', 'Problematiza&ccedil;&atilde;o', ['class' => 'control-label']) !!}
                    {!! Form::textarea('problematizacao', null, ['class' => 'form-control alert-info']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('delimitacao', 'Delimita&ccedil;&atilde;o', ['class' => 'control-label']) !!}
                    {!! Form::textarea('delimitacao', null, ['class' => 'form-control alert-info']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('objetivo_geral', 'Objetivo Geral', ['class' => 'control-label']) !!}
                    {!! Form::textarea('objetivo_geral', null, ['class' => 'form-control alert-info']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('objetivo_especifico', 'Objetivo especifico', ['class' => 'control-label']) !!}
                    {!! Form::textarea('objetivo_especifico', null, ['class' => 'form-control alert-info']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('justificativa', 'Justificativa', ['class' => 'control-label']) !!}
                    {!! Form::textarea('justificativa', null, ['class' => 'form-control alert-info']) !!}
                </div>

            </div>
        </div>
    </div>

    <hr />
        {!! Form::submit('Enviar proposta', ['class' => 'btn btn-info']) !!}

</div>
{!! Form::close() !!}

@endsection