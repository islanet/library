@extends('dashboard')

@section('main')
<br />
<h3 align="center"><b>Autores</b></h3>
<br />
<div align="right">
	<a href="{{ route('author.create') }}" class="btn btn-success btn-sm">Nuevo</a>
</div>
<br />
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger">
	<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered table-striped">
 <tr>
  <th width="35%">Nombres</th>
  <th width="35%">Apellidos</th>
  <th width="30%">Opciones</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td>{{ $row->name }}</td>
   <td>{{ $row->last_name }}</td>
   <td>
        <form action="{{ route('author.destroy', $row->id) }}" method="post">
            <a href="{{ route('author.show', $row->id) }}" class="btn btn-primary">Ver</a>
            <a href="{{ route('author.edit', $row->id) }}" class="btn btn-warning">Editar</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
   </td>
  </tr>
 @endforeach
</table>
{!! $data->links() !!}
@endsection
