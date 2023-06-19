@extends('dashboard')

@section('main')
<br />
<h3 align="center"><b>Libros</b></h3>
<br />
<div align="right">
	<a href="{{ route('book.create') }}" class="btn btn-success btn-sm">Nuevo</a>
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
  <th width="35%">Título</th>
  <th width="35%">Autor</th>
  <th width="30%">Opciones</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td>{{ $row->title }}</td>
   <td>{{ $row->author->name . ' '. $row->author->last_name }}</td>
   <td>
        <form action="{{ route('book.destroy', $row->id) }}" method="post">
            <a href="{{ route('book.show', $row->id) }}" class="btn btn-primary">Ver</a>
            <a href="{{ route('book.edit', $row->id) }}" class="btn btn-warning">Editar</a>
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
