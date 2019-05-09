@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h3>{{ $client->id ? 'Editar' : 'Crear' }} Cliente:</h3>
        <form action="/clients" method="POST">
            {{ csrf_field() }}
            @if($client->id)
            <input type="hidden" name="id" value="{{ $client->id }}">
            @endif
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" id="name"  value="{{ $client->name }}" placeholder="" aria-describedby="nameHelpBlock" required>
                <small id="nameHelpBlock" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="text" class="form-control" name="email" id="email"  value="{{ $client->email }}" placeholder="" aria-describedby="emailHelpBlock" required>
                <small id="emailHelpBlock" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label>Sexo:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="sex0" value="0" {{ $client->sex == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="sex0">Hombre</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="sex1" value="1" {{ $client->sex == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="sex1">Mujer</label>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Ocupación:</label>
                <select class="custom-select" name="occupation_id" id="occupation_id">
                    @foreach($occupations as $occupation)
                    <option value="{{ $occupation->id }}" {{ $client->occupation_id == $occupation->id? 'selected' : ''}}>{{ $occupation->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection
