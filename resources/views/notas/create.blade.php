@extends('layouts.app')

@section('content')
    <h1>Crear Nota</h1>

    <form action="{{ route('notas.store') }}" method="POST">
        @csrf

        <div>
            <label for="estudiante_id">Estudiante</label>
            <select name="estudiante_id" id="estudiante_id" required>
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nota1">Nota 1</label>
            <input type="number" name="nota1" id="nota1" step="0.01" min="0" max="10" required>
        </div>

        <div>
            <label for="nota2">Nota 2</label>
            <input type="number" name="nota2" id="nota2" step="0.01" min="0" max="10" required>
        </div>

        <div>
            <label for="nota3">Nota 3</label>
            <input type="number" name="nota3" id="nota3" step="0.01" min="0" max="10" required>
        </div>

        <button type="submit">Guardar Nota</button>
    </form>
@endsection
