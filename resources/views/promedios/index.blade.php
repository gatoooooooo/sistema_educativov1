@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Promedios</h1>
    <a href="{{ route('promedios.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Promedio</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Estudiante</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Promedio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($promedios as $promedio)
            <tr>
                <td>{{ $promedio->id }}</td>
                <td>{{ $promedio->estudiante->nombre }}</td>
                <td>{{ $promedio->nota1 }}</td>
                <td>{{ $promedio->nota2 }}</td>
                <td>{{ $promedio->nota3 }}</td>
                <td>{{ number_format(($promedio->nota1 + $promedio->nota2 + $promedio->nota3) / 3, 2) }}</td>
                <td>
                    <a href="{{ route('promedios.edit', $promedio->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('promedios.destroy', $promedio->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este promedio?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection