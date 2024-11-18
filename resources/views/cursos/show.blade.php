<!-- resources/views/cursos/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $curso->nombre }}</h1>

    <p>{{ $curso->descripcion }}</p>
    <p>Fecha de inicio: {{ $curso->fecha_inicio }}</p>
    <p>Fecha de fin: {{ $curso->fecha_fin }}</p>

    <a href="{{ route('cursos.edit', $curso->id) }}">Editar</a>
    <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection
