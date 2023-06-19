@extends('dashboard')

@section('main')
<div align="right">
	<a href="{{ route('author.index') }}" class="btn btn-default">Volver</a>
</div>
<br />
<br />
<h3 align="center"><b>Editar autor</b></h3>
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
<form method="post" action="{{ route('author.update', $data->id) }}" >

	@csrf
	@method('PATCH')
	<div class="form-group">
		<label class="col-md-4 text-right">Nombres:</label>
		<div class="col-md-8">
			<input type="text" name="name" value="{{ old('name',$data->name) }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Apellidos:</label>
		<div class="col-md-8">
			<input type="text" name="last_name" value="{{ old('last_name',$data->last_name) }}" class="form-control input-lg" />
		</div>
	</div>
	<br /><br /><br />
	<div class="form-group text-center">
		<input type="submit" name="edit" class="btn btn-primary input-lg" value="Editar" />
	</div>
</form>
@endsection


