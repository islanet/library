@extends('dashboard')

@section('main')
<div align="right">
	<a href="{{ route('book.index') }}" class="btn btn-default">Volver</a>
</div>
<br />
<h3 align="center"><b>Nuevo Libro</b></h3>
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


<form method="post" action="{{ route('book.store') }}">

	@csrf
	<div class="form-group">
		<label class="col-md-4 text-right">Título:</label>
		<div class="col-md-8">
			<input type="text" name="title" value="{{ old('title') }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Autor:</label>
		<div class="col-md-8">
            <select class="form-control input-lg" name="author_id" class="form-control">
                <option value="0" selected>Seleccione un Autor</option>
                @foreach($authors as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
		</div>
	</div>
	<br />
	<br />
	<br />
    <div class="form-group">
		<label class="col-md-4 text-right">Total ejemplares:</label>
		<div class="col-md-8">
			<input type="text" name="total" value="{{ old('total') }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
    <div class="form-group">
		<label class="col-md-4 text-right">Ejemplares disponibles:</label>
		<div class="col-md-8">
			<input type="text" name="available" value="{{ old('available') }}" class="form-control input-lg" />
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
