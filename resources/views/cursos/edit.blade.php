<!-- resources/views/cursos/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Curso</h1>

    <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ $curso->nombre }}" required>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" required>{{ $curso->descripcion }}</textarea>

        <label for="fecha_inicio">Fecha de Inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ $curso->fecha_inicio }}" required>

        <label for="fecha_fin">Fecha de Fin</label>
        <input type="date" name="fecha_fin" id="fecha_fin" value="{{ $curso->fecha_fin }}" required>

        <button type="submit">Actualizar Curso</button>
    </form>
@endsection
