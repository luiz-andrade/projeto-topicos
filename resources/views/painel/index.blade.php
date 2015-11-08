@extends('template.template')

@section('content')
    <h1>Bem Vindo ao Index</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>ano</th>
        </tr>
        </thead>
        <tbody>
        <tr>
    @foreach($dados as $dado)
        <td>
            {!! $dado->id !!}
        </td>
        <td>
            {!! $dado->ano !!}
        </td>
    @endforeach

    </tr>
        </tbody>
    </table>
@endsection