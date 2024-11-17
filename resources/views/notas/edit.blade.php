@extends('layouts.app')

@section('content')
    <h1>Editar Nota</h1>

    <form action="{{ route('notas.update', $nota) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="estudiante_id">Estudiante</label>
            <select name="estudiante_id" id="estudiante_id" required>
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}" {{ $nota->estudiante_id == $estudiante->id ? 'selected' : '' }}>{{ $estudiante->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nota1">Nota 1</label>
            <input type="number" name="nota1" id="nota1" step="0.01" min="0" max="10" value="{{ $nota->nota1 }}" required>
        </div>

        <div>
            <label for="nota2">Nota 2</label>
            <input type="number" name="nota2" id="nota2" step="0.01" min="0" max="10" value="{{ $nota->nota2 }}" required>
        </div>

        <div>
            <label for="nota3">Nota 3</label>
            <input type="number" name="nota3" id="nota3" step="0.01" min="0" max="10" value="{{ $nota->nota3 }}" required>
        </div>

        <button type="submit">Actualizar Nota</button>
    </form>
@endsection
