@extends('dashboard')

@section('main')
<div align="right">
	<a href="{{ route('loan.index') }}" class="btn btn-default">Volver</a>
</div>
<br />
<h3 align="center"><b>Nuevo Préstamo</b></h3>
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


<form method="post" action="{{ route('loan.store') }}">

	@csrf
	<div class="form-group">
		<label class="col-md-4 text-right">Libro:</label>
		<div class="col-md-8">
			<select class="form-control input-lg" name="book_id" class="form-control">
                <option value="0" selected>Seleccione un libro</option>
                @foreach($books as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Socio:</label>
		<div class="col-md-8">
            <select class="form-control input-lg" name="member_id" class="form-control">
                <option value="0" selected>Seleccione un Socio</option>
                @foreach($members as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
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
