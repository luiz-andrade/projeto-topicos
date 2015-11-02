@extends('template.template')

@section('content')
<h2>Cadastrar proposta TCC 1</h2>

{!! Form::open(['url' => 'propostatcc/cadastro']) !!}
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Dados Pessoais
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">

                <div class="form-group">
                    {!! Form::label('nome', 'Nome do formando') !!}
                    {!! Form::text('nome', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('orientador', 'Sugest&atilde;o para orientador') !!}
                    {!! Form::text('orientador', '', ['class' => 'form-control']) !!}
                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Do TCC
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('titulo', 'Titulo', ['class' => 'control-label']) !!}
                    {!! Form::text('titulo', '', ['class' => 'form-control']) !!}

                    {!! Form::label('subtitulo', 'Subtitulo', ['class' => 'control-label']) !!}
                    {!! Form::text('subtitulo', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('local', 'Local', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                    {!! Form::text('local', '', ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::label('ano', 'Ano', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('ano', '', ['class' => 'form-control']) !!}
                    </div>
                </div>

                <hr />

                <div class="form-group">
                    {!! Form::label('finalidade', 'Finalidade', ['class' => 'control-label']) !!}
                    {!! Form::textarea('finalidade', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('objetivos', 'Objetivos', ['class' => 'control-label']) !!}
                    {!! Form::textarea('objetivos', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('problematizacao', 'Problematiza&ccedil;&atilde;o', ['class' => 'control-label']) !!}
                    {!! Form::textarea('problematizacao', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('delimitacao', 'Delimita&ccedil;&atilde;o', ['class' => 'control-label']) !!}
                    {!! Form::textarea('delimitacao', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('objetivo_geral', 'Objetivo Geral', ['class' => 'control-label']) !!}
                    {!! Form::textarea('objetivo_geral', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('objetivo_especifico', 'Objetivo especifico', ['class' => 'control-label']) !!}
                    {!! Form::textarea('objetivo_especifico', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('justificativa', 'Justificativa', ['class' => 'control-label']) !!}
                    {!! Form::textarea('justificativa', '', ['class' => 'form-control']) !!}
                </div>

            </div>
        </div>
    </div>

    <hr />
        {!! Form::submit('Enviar proposta', ['class' => 'btn btn-success']) !!}

</div>
{!! Form::close() !!}

@endsection