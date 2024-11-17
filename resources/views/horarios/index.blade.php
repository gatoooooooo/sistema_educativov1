@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Horarios del Curso: {{ $curso->nombre }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('horarios.create', $curso->id) }}" class="btn btn-primary mb-3">Registrar Nuevo Horario</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>Hora de Inicio</th>
                    <th>Hora de Fin</th>
                    <th>Hora de Recreo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{ $horario->dia }}</td>
                        <td>{{ $horario->hora_inicio }}</td>
                        <td>{{ $horario->hora_fin }}</td>
                        <td>{{ $horario->hora_recreo ? $horario->hora_recreo : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
