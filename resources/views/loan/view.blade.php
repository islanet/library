@extends('dashboard')

@section('main')
<div align="right">
    <a href="{{ route('loan.index') }}" class="btn btn-default">Volver</a>
</div>
<br />
<br />
<h3 align="center"><b>Ver Préstamo</b></h3>
<br />
<div class="jumbotron text-center">

	<br />
	<h3><b>Título</b> : {{ $data->copy->book->title }} </h3>
	<h3><b>Autor</b> : {{ $data->copy->book->author->name . ' ' . $data->copy->book->author->last_name }}</h3>
    <h3><b>Socio</b> : {{ $data->member->name . ' ' .  $data->member->last_name }}</h3>
</div>
@endsection
