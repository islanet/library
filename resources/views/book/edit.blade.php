@extends('dashboard')

@section('main')
<div align="right">
	<a href="{{ route('book.index') }}" class="btn btn-default">Volver</a>
</div>
<br />
<br />
<h3 align="center"><b>Editar libro</b></h3>
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
<form method="post" action="{{ route('book.update', $data->id) }}" >

	@csrf
	@method('PATCH')
	<div class="form-group">
		<label class="col-md-4 text-right">Título:</label>
		<div class="col-md-8">
			<input type="text" name="title" value="{{ old('title',$data->title) }}" class="form-control input-lg" />
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
                    @if ($key == $data->author_id)
                        <option selected value="{{ $key }}">{{ $value }}</option>
                    @else
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endif
                @endforeach
            </select>
        </div>
	</div>
	<br /><br /><br />
	<div class="form-group text-center">
		<input type="submit" name="edit" class="btn btn-primary input-lg" value="Editar" />
	</div>
</form>
@endsection


