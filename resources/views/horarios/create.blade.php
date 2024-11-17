@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registrar Horario para el Curso: {{ $curso->nombre }}</h1>

        <form action="{{ route('horarios.store', $curso->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="dia">Día</label>
                <input type="text" id="dia" name="dia" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hora_inicio">Hora de Inicio</label>
                <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hora_fin">Hora de Fin</label>
                <input type="time" id="hora_fin" name="hora_fin" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hora_recreo">Hora de Recreo (opcional)</label>
                <input type="time" id="hora_recreo" name="hora_recreo" class="form-control">
            </div>

            <button type="submit" class="btn btn-success mt-3">Registrar Horario</button>
        </form>
    </div>
@endsection
