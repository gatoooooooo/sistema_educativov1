@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Promedio</h1>
    <form action="{{ route('promedios.update', $promedio->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="estudiante_id" class="form-label">Estudiante</label>
            <select name="estudiante_id" id="estudiante_id" class="form-control" required>
                <option value="">Selecciona un estudiante</option>
                @foreach ($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}" @if ($promedio->estudiante_id == $estudiante->id) selected @endif>
                    {{ $estudiante->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nota1" class="form-label">Nota 1</label>
            <input type="number" name="nota1" id="nota1" class="form-control" value="{{ $promedio->nota1 }}" required step="0.01" min="0" max="10">
        </div>
        <div class="mb-3">
            <label for="nota2" class="form-label">Nota 2</label>
            <input type="number" name="nota2" id="nota2" class="form-control" value="{{ $promedio->nota2 }}" required step="0.01" min="0" max="10">
        </div>
        <div class="mb-3">
            <label for="nota3" class="form-label">Nota 3</label>
            <input type="number" name="nota3" id="nota3" class="form-control" value="{{ $promedio->nota3 }}" required step="0.01" min="0" max="10">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
