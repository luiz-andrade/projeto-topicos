@extends('template.template')

@section('content')
    <h1>Bem Vindo ao Index</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>ano</th>
            <th>Aluno</th>
            <th>Orientador</th>
            <th>Titulo</th>
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
        </tr>
    @endforeach

        </tbody>
    </table>
@endsection