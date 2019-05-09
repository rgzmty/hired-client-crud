@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>E-Mail</th>
            <th>Sexo</th>
            <th>Ocupación</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->sex ? 'Mujer' : 'Hombre' }}</td>
            <td>{{ $client->occupation->name }}</td>
            <td>
                <form method="POST" action="/clients/{{ $client->id }}" class="form form-inline">
                    <a class="btn btn-sm" href="/clients/{{ $client->id }}" role="button">Editar</a>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm">Borrar</button>
                    {!! method_field('DELETE') !!}
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ App\Client::paginate(10) }}
<p>
    <a class="btn btn-primary" href="/clients/create" role="button">Agregar cliente</a>
</p>
@endsection
