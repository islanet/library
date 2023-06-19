@extends('dashboard')

@section('main')
<div align="right">
    <a href="{{ route('author.index') }}" class="btn btn-default">Volver</a>
</div>
<br />
<br />
<h3 align="center"><b>Ver autor</b></h3>
<br />
<div class="jumbotron text-center">

	<br />
	<h3><b>Nombres</b> : {{ $data->name }} </h3>
	<h3><b>Apellidos</b> : {{ $data->last_name }}</h3>
</div>
@endsection
