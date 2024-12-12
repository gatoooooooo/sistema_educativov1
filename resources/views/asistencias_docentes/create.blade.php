@extends('backend.layouts.master')

@section('title', 'Registrar Asistencia de Docente')

<<<<<<< HEAD
@section('styles')
    <style>
        /* Estilos personalizados */
        .card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header-title {
            color: #007bff;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            color: #495057;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }
        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-secondary {
            padding: 8px 15px;
            font-size: 14px;
        }
    </style>
@endsection

=======
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Asistencias de Docentes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.asistencias_docentes.index') }}">Listado de Asistencias</a></li>
                        <li><span>Registrar</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>

    <div class="main-content-inner">
<<<<<<< HEAD
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Registrar Nueva Asistencia de Docente</h4>
                        <a href="{{ route('admin.asistencias_docentes.index') }}" class="btn btn-secondary mb-3">
                            <i class="fas fa-arrow-left"></i> Volver al Listado
                        </a>
=======
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Registrar Nueva Asistencia de Docente</h4>
                        <a href="{{ route('admin.asistencias_docentes.index') }}" class="btn btn-secondary mb-3">Volver al Listado</a>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.asistencias_docentes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="docente_id">Docente</label>
                                <select name="docente_id" id="docente_id" class="form-control" required>
                                    <option value="">Seleccione un docente</option>
                                    @foreach($docentes as $docente)
                                        <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control" required>
                                    <option value="presente" {{ old('estado') == 'presente' ? 'selected' : '' }}>Presente</option>
                                    <option value="ausente" {{ old('estado') == 'ausente' ? 'selected' : '' }}>Ausente</option>
                                    <option value="justificado" {{ old('estado') == 'justificado' ? 'selected' : '' }}>Justificado</option>
                                </select>
                            </div>

<<<<<<< HEAD
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Registrar Asistencia
                                </button>
                            </div>
=======
                            <button type="submit" class="btn btn-success mt-3">Registrar Asistencia</button>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
