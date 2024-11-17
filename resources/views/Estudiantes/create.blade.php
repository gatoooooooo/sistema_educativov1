@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Estudiante</h1>

    <form action="{{ route('estudiantes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
</div>
@endsection
