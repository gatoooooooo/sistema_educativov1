@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Estudiantes</h1>
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-3">Agregar Estudiante</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->id }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->apellido }}</td>
                    <td>{{ $estudiante->correo }}</td>
                    <td>
                        <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
