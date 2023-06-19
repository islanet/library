@extends('dashboard')

@section('main')
<div align="right">
    <a href="{{ route('member.index') }}" class="btn btn-default">Volver</a>
</div>
<br />
<br />
<h3 align="center"><b>Ver Socio</b></h3>
<br />
<div class="jumbotron text-center">

	<br />
    <h3><b>Número de Socio</b> : {{ $data->member_number }} </h3>
	<h3><b>Nombres</b> : {{ $data->name }} </h3>
	<h3><b>Apellidos</b> : {{ $data->last_name }}</h3>
    <h3><b>Teléfono</b> : {{ $data->phone }}</h3>
    <h3><b>Límite de Prestamos</b> : {{ $data->loans_books_limit }}</h3>
    <h3><b>Activo</b> : @if ($data->active) Si @else No @endif</h3>
</div>
@endsection
