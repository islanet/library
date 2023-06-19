@extends('dashboard')

@section('main')
<div align="right">
	<a href="{{ route('member.index') }}" class="btn btn-default">Volver</a>
</div>
<br />
<br />
<h3 align="center"><b>Editar Socio</b></h3>
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
<form method="post" action="{{ route('member.update', $data->id) }}" >

	@csrf
	@method('PATCH')
    <div class="form-group">
		<label class="col-md-4 text-right">Número de socio:</label>
		<div class="col-md-8">
			<input type="text" readonly name="member_number" value="{{ $data->member_number }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Nombres:</label>
		<div class="col-md-8">
			<input type="text" name="name" value="{{ old("name",$data->name) }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Apellidos:</label>
		<div class="col-md-8">
			<input type="text" name="last_name" value="{{ old("last_name",$data->last_name) }}" class="form-control input-lg" />
		</div>
	</div>
	<br /><br /><br />
    <div class="form-group">
		<label class="col-md-4 text-right">Teléfono:</label>
		<div class="col-md-8">
			<input type="text" name="phone" value="{{ old("phpne",$data->phone) }}" class="form-control input-lg" />
		</div>
	</div>
	<br /><br /><br />
    <div class="form-group">
		<label class="col-md-4 text-right">Límite de Préstamos:</label>
		<div class="col-md-8">
			<input type="text" name="loans_books_limit" value="{{ old("loans_books_limit",$data->loans_books_limit) }}" class="form-control input-lg" />
		</div>
	</div>
	<br /><br /><br />
    <div class="form-group">
		<label class="col-md-4 text-right">Activo:</label>
		<div class="col-md-8">
            <select class="form-control input-lg" name="active" class="form-control">
                @if (old("active",$data->active))
                    <option value="1" selected>Si</option>
                    <option value="0" >No</option>
                @else
                    <option value="1">Si</option>
                    <option value="0" selected>No</option>
                @endif

            </select>
        </div>
	</div>
	<br /><br /><br />
	<div class="form-group text-center">
		<input type="submit" name="edit" class="btn btn-primary input-lg" value="Editar" />
	</div>
</form>
@endsection


