@extends('dashboard')

@section('main')
<div align="right">
    <a href="{{ route('book.index') }}" class="btn btn-default">Volver</a>
</div>
<br />
<br />
<h3 align="center"><b>Ver autor</b></h3>
<br />
<div class="jumbotron text-center">

	<br />
	<h3><b>Título</b> : {{ $data->title }} </h3>
	<h3><b>Autor</b> : {{ $data->author->name . ' ' . $data->author->last_name }}</h3>
</div>
@endsection
