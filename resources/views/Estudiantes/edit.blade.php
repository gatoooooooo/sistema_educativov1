@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Estudiante</h1>

    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $estudiante->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="form-control" value="{{ $estudiante->apellido }}" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" class="form-control" value="{{ $estudiante->correo }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Actualizar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
</div>
@endsection
