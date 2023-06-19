@extends('dashboard')

@section('main')
<br />
<h3 align="center"><b>Préstamos</b></h3>
<br />
<div align="right">
	<a href="{{ route('loan.create') }}" class="btn btn-success btn-sm">Nuevo</a>
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
  <th width="20%">Título</th>
  <th width="20%">Autor</th>
  <th width="15%">Socio</th>
  <th width="15%">Activo</th>
  <th width="30%">Opciones</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td>{{ $row->copy->book->title }}</td>
   <td>{{ $row->copy->book->author->name . ' '. $row->copy->book->author->last_name }}</td>
   <td>{{ $row->member->name . ' '. $row->member->last_name }}</td>
   <td>
        @if ($row->active)
            Si
        @else
            No
        @endif
   </td>
   <td>
        <form action="{{ route('loan.update', $row->id) }}" method="post">
            <a href="{{ route('loan.show', $row->id) }}" class="btn btn-primary">Ver</a>
            @csrf
            @method('PATCH')
            @if ($row->active)
                <button type="submit" class="btn btn-warning">Devolver Libro</button>
            @endif
        </form>
   </td>
  </tr>
 @endforeach
</table>
{!! $data->links() !!}
@endsection
