@extends('dashboard')

@section('main')
<br />
<h3 align="center"><b>Socios</b></h3>
<br />
<div align="right">
	<a href="{{ route('member.create') }}" class="btn btn-success btn-sm">Nuevo</a>
</div>
<br />
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered table-striped">
 <tr>
  <th width="10%">Número de Socio</th>
  <th width="20%">Nombres</th>
  <th width="20%">Apellidos</th>
  <th width="10%">Teléfono</th>
  <th width="5%">Límite de Préstamos</th>
  <th width="5%">Activo</th>
  <th width="20%">Opciones</th>
 </tr>
 @foreach($data as $row)
  <tr>
    <td>{{ $row->member_number }}</td>
   <td>{{ $row->name }}</td>
   <td>{{ $row->last_name }}</td>
   <td>{{ $row->phone }}</td>
   <td>{{ $row->loans_books_limit }}</td>
   <td>
        @if ($row->active)
            Si
        @else
            No
        @endif
    </td>
   <td>
        <form action="{{ route('member.destroy', $row->id) }}" method="post">
            <a href="{{ route('member.show', $row->id) }}" class="btn btn-primary">Ver</a>
            <a href="{{ route('member.edit', $row->id) }}" class="btn btn-warning">Editar</a>
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
