@extends('layouts.app')
@section('content')
<form action="/client" method="POST">
      {{ csrf_field() }}
</form>
@endsection
