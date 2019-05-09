@extends('layouts.app')
@section('content')
<table>
    <thead>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>E-Mail</th>
            <th>Sexo</th>
            <th>Ocupación</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>
                <a href="/{{ $client->id }}">Editar</a>
                <form method="POST" action="/{{ $client->id }}">
                    {{ csrf_field() }}
                    <button type="submit">Borrar</button>
                    {!! method_field('DELETE') !!}
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->sexo ? 'Hombre' : 'Mujer' }}</td>
            <td>{{ $client->occupation->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ App\Client::paginate(10) }}
<p><a href="/clients/add">Agregar cliente</a></p>
@endsection
