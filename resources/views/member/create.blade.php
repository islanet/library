@extends('dashboard')

@section('main')
<div align="right">
	<a href="{{ route('author.index') }}" class="btn btn-default">Volver</a>
</div>
<br />
<h3 align="center"><b>Nuevo autor</b></h3>
<br />

@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif


<form method="post" action="{{ route('author.store') }}">

	@csrf
	<div class="form-group">
		<label class="col-md-4 text-right">Nombres</label>
		<div class="col-md-8">
			<input type="text" name="name" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Apellidos</label>
		<div class="col-md-8">
			<input type="text" name="last_name" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group text-center">
		<input type="submit" name="add" class="btn btn-primary input-lg" value="Aceptar" />
	</div>

</form>

@endsection
