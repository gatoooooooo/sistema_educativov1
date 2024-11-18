<!-- resources/views/cursos/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Curso</h1>

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" required></textarea>

        <label for="fecha_inicio">Fecha de Inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" required>

        <label for="fecha_fin">Fecha de Fin</label>
        <input type="date" name="fecha_fin" id="fecha_fin" required>

        <button type="submit">Crear Curso</button>
    </form>
@endsection
