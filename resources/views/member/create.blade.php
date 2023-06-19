@extends('dashboard')

@section('main')
<div align="right">
	<a href="{{ route('member.index') }}" class="btn btn-default">Volver</a>
</div>
<br />
<h3 align="center"><b>Nuevo socio</b></h3>
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


<form method="post" action="{{ route('member.store') }}">

	@csrf
    <div class="form-group">
		<label class="col-md-4 text-right">Número de socio:</label>
		<div class="col-md-8">
			<input type="text" name="member_number" value="{{ old('member_number') }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Nombres:</label>
		<div class="col-md-8">
			<input type="text" name="name" value="{{ old('name') }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Apellidos:</label>
		<div class="col-md-8">
			<input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
    <div class="form-group">
		<label class="col-md-4 text-right">Número de teléfono:</label>
		<div class="col-md-8">
			<input type="text" name="phone" value="{{ old('phone') }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
    <div class="form-group">
		<label class="col-md-4 text-right">Límite de préstamos:</label>
		<div class="col-md-8">
            <input type="text" name="loans_books_limit" value="{{ old('loans_books_limit') }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
    <div class="form-group">
		<label class="col-md-4 text-right">Activo:</label>
		<div class="col-md-8">
            <select class="form-control input-lg" name="active" class="form-control">
                <option value="1" selected>Si</option>
                <option value="0" >No</option>
            </select>
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
