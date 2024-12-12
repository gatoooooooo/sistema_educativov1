@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm border-0 rounded">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">Editar Asistencia de Docente</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.asistencias_docentes.index') }}" class="btn btn-outline-secondary mb-3">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>

                <form action="{{ route('admin.asistencias_docentes.update', $asistencia->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Docente (Deshabilitado) -->
                    <div class="form-group mb-4">
                        <label for="docente_id" class="font-weight-bold">Docente</label>
                        <select name="docente_id" id="docente_id" class="form-control bg-light" disabled>
                            <option value="{{ $asistencia->docente_id }}">
                                {{ $asistencia->docente->nombre }}
                            </option>
                        </select>
                    </div>

                    <!-- Fecha -->
                    <div class="form-group mb-4">
                        <label for="fecha" class="font-weight-bold">Fecha</label>
                        <input 
                            type="date" 
                            name="fecha" 
                            id="fecha" 
                            class="form-control" 
                            value="{{ $asistencia->fecha }}" 
                            required
                        >
                    </div>

                    <!-- Estado -->
                    <div class="form-group mb-4">
                        <label for="estado" class="font-weight-bold">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="presente" {{ $asistencia->estado == 'presente' ? 'selected' : '' }}>Presente</option>
                            <option value="ausente" {{ $asistencia->estado == 'ausente' ? 'selected' : '' }}>Ausente</option>
                            <option value="justificado" {{ $asistencia->estado == 'justificado' ? 'selected' : '' }}>Justificado</option>
                        </select>
                    </div>

                    <!-- Botón de Enviar -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4 py-2">
                            <i class="fas fa-save"></i> Actualizar Asistencia
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Mejoras visuales */
        .card {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            background-color: #007bff;
        }
        .form-group label {
            color: #495057;
            font-size: 1rem;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 10px;
            transition: box-shadow 0.3s ease;
        }
        .form-control:focus {
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
            border-color: #007bff;
        }
        .btn-success {
            font-size: 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
@endsection
