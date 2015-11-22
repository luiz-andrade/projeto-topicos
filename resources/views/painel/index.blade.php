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
                @if(!empty($usuario))
                    <div class="{!! $hidden !!}">
                        <a href="/propostatcc/editar/{!! $dado->id !!}" class="btn btn-xs btn-warning">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"> Revisar </span>
                        </a>&nbsp;

                        <a href="/propostatcc/enviar/{!! $dado->id !!}" class="btn btn-xs btn-success">
                            <span class="glyphicon glyphicon-send" aria-hidden="true"> Enviar </span>
                        </a>
                    </div>&nbsp;
                @else
                    <div class="">
                        <a href="/propostatcc/editar/{!! $dado->id !!}" class="btn btn-xs btn-warning">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"> Revisar </span>
                        </a>&nbsp;

                        <a href="/propostatcc/enviar/{!! $dado->id !!}" class="btn btn-xs btn-success">
                            <span class="glyphicon glyphicon-send" aria-hidden="true"> Enviar </span>
                        </a>
                    </div>&nbsp;
                @endif

                    <a href="/propostatcc/pdf/{!! $dado->id !!}" class="btn btn-xs btn-success">
                        <span class="glyphicon glyphicon-download" aria-hidden="true"> PDF</span>
                    </a>

            </td>
        </tr>
    @endforeach

        </tbody>
    </table>
@endsection