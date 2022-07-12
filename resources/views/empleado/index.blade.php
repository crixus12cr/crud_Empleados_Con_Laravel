@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar Nuevo Empleado</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        </thead>

        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>

                <td>
                    <img src="{{ asset('storage').'/'.$empleado->Foto }}" class="img-thumbnail img-fluid" width="200" height="200">
                    {{-- {{ $empleado->Foto }} --}}

                </td>

                <td>{{ $empleado->Nombre }}</td>
                <td>{{ $empleado->ApellidoPaterno }}</td>
                <td>{{ $empleado->ApellidoMaterno }}</td>
                <td>{{ $empleado->Correo }}</td>
                <td>

                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-dark">
                        Editar
                    </a>

                    |
                    <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" onclick="return confirm('¿Quieres Borrar?')" class="btn btn-danger" value="Borrar">
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection
