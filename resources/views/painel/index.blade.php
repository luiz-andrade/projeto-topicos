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
                <span class="glyphicon glyphicon-edit" aria-hidden="true"> Editar</span>
                <span class="glyphicon glyphicon-edit" aria-hidden="true"> Excluir</span>
            </td>
        </tr>
    @endforeach

        </tbody>
    </table>
@endsection