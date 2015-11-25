@extends('template.template')

@section('content')
    {{--<h1>Bem Vindo ao Index</h1>--}}

    @section('title')
        <h3>{!! $title !!}</h3>
    @endsection

@if(!$dados->isEmpty())

    {{--<table class="table table-hover table-bordered">--}}
    <div class="col-sm-10 col-lg-12 col-md-12 table-responsiveZZ"  style="padding-bottom: 150px">
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr class="active">
                <th>#</th>
                <th>Data</th>
                <th>Aluno</th>
                <th>Orientador</th>
                <th>Titulo</th>
                <th>Situação</th>
                <th>Ação</th>
                <th>Visualização</th>
            </tr>
            </thead>
            <tbody>

        @foreach($dados as $dado)
            <tr>
                <td>
                    {!! count($dado->id) !!}
                </td>
                <td>
                    {!! $dado->ano !!}
                </td>
                <td>
                    {!! $dado->nome !!}
                </td>
                <td>
                    {!! $dado->orientador !!}
                </td>
                <td>
                    {!! $dado->titulo !!}
                </td>
                <td>
                    {!! $dado->status !!}
                </td>

                <td>
                    @if(!empty($usuario))
                        @if(!$hidden)
                        <span class="{!! $hiddenAluno !!}">
                            <!-- Single button -->


                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-primaryme dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Escolha <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/propostatcc/editar/{!! $dado->id !!}">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"> {!! $btnEditar !!}</span>
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li> <a href="/propostatcc/enviar/{!! $dado->id !!}?situacao=3">
                                            <span class="glyphicon glyphicon-send" aria-hidden="true"> Enviar </span>
                                        </a></li>
                                </ul>
                            </div>
                        </span>&nbsp;
                        @endif
                    @else
                        <div class="{!! $hidden !!}">
                            <a href="/propostatcc/enviar/{!! $dado->id !!}?situacao=0" class="btn btn-xs btn-success">
                                <span class="glyphicon glyphicon-send" aria-hidden="true"> Aprovar </span>
                            </a>&nbsp;
                            <a href="/propostatcc/enviar/{!! $dado->id !!}?situacao=1" class="btn btn-xs btn-danger">
                                <span class="glyphicon glyphicon-send" aria-hidden="true"> Reprovar </span>
                            </a>&nbsp;

                            <a href="/propostatcc/enviar/{!! $dado->id !!}?situacao=2" class="btn btn-xs btn-warning {!! $disabled !!} ">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"> {!! $btnEditar !!} </span>
                            </a>&nbsp;
                        </div>
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-zoom-in"></span> Ver na tela
                    </button>

                    {{--<span class="glyphicon glyphicon-download" aria-hidden="true"> PDF</span>--}}

                    <a href="/propostatcc/pdf/{!! $dado->id !!}" class="btn btn-xs btn-info">
                        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"> PDF</span>
                    </a>
                </td>
            </tr>


        @endforeach

            </tbody>
        </table>
    </div>

    @include('painel.show')
@else
    <div class="alert alert-danger text-center">
        <h2>
            <span class="glyphicon glyphicon-alert"></span> Você não possui proposta cadastrada
        &nbsp;
            <button class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Cadastrar</button>
        </h2>
    </div>
@endif

@endsection