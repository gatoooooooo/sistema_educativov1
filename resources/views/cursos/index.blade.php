<!-- resources/views/cursos/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Listado de Cursos</h1>

    <a href="{{ route('cursos.create') }}">Crear Nuevo Curso</a>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->nombre }}</td>
                    <td>{{ $curso->descripcion }}</td>
                    <td>{{ $curso->fecha_inicio }}</td>
                    <td>{{ $curso->fecha_fin }}</td>
                    <td>
                        <a href="{{ route('cursos.show', $curso->id) }}">Ver</a>
                        <a href="{{ route('cursos.edit', $curso->id) }}">Editar</a>
                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection