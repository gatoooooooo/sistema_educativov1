@extends('layouts.app')

@section('content')
    <h1>Notas de los Estudiantes</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('notas.create') }}">Agregar Nota</a>

    <table>
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $nota)
                <tr>
                    <td>{{ $nota->estudiante->nombre }}</td>
                    <td>{{ $nota->nota1 }}</td>
                    <td>{{ $nota->nota2 }}</td>
                    <td>{{ $nota->nota3 }}</td>
                    <td>
                        <a href="{{ route('notas.edit', $nota) }}">Editar</a>
                        <form action="{{ route('notas.destroy', $nota) }}" method="POST" style="display:inline;">
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
