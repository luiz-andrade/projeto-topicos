@extends('template.template')

@section('content')
    <h1>Bem Vindo ao Index</h1>

    <table class="table table-hover table-bordered">
        <thead>
        <tr class="info">
            <th>Id</th>
            <th>ano</th>
            <th>Aluno</th>
            <th>Orientador</th>
            <th>Titulo</th>
            <th>Situação</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
    @foreach($dados as $dado)
        <tr>
            <td>
                {!! $dado->id !!}
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

            <td colspan="2">
                @if(!empty($usuario))
                    <div class="{!! $hiddenAluno !!}">
                        <a href="/propostatcc/editar/{!! $dado->id !!}" class="btn btn-xs btn-warning">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"> {!! $btnEditar !!}</span>
                        </a>&nbsp;

                        <a href="/propostatcc/enviar/{!! $dado->id !!}?situacao=3" class="btn btn-xs btn-success">
                            <span class="glyphicon glyphicon-send" aria-hidden="true"> Enviar </span>
                        </a>
                    </div>&nbsp;
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

                    <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-zoom-in"></span> Ver
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

    @include('painel.show')


@endsection