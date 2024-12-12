@extends('backend.layouts.master')

@section('title', 'Crear Curso - Panel de Administración')

@section('styles')
    <style>
        /* Colores institucionales */
        :root {
            --color-primario: #005AA7; /* Azul Institucional */
            --color-secundario: #F4F6F9; /* Gris Claro */
            --color-hover: #003b70; /* Azul más oscuro para hover */
            --color-fondo: #F9FAFB; /* Fondo suave */
            --color-error: #dc3545; /* Rojo para mensajes de error */
            --color-exito: #28a745; /* Verde para mensajes de éxito */
        }

        /* Diseño del formulario */
        .form-control, .form-select, textarea {
            border-radius: 8px;
            border: 2px solid #ccc;
            background-color: var(--color-secundario);
            padding-left: 30px;
            position: relative;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus, textarea:focus {
            border-color: var(--color-primario);
            box-shadow: 0 0 5px rgba(0, 90, 167, 0.6);
            outline: none;
        }

        /* Botones de acción */
        .btn-primary {
            background-color: var(--color-primario);
            border-color: var(--color-primario);
            border-radius: 50px;
            padding: 10px 30px;
            font-size: 1.1rem;
        }

        .btn-primary:hover {
            background-color: var(--color-hover);
            border-color: var(--color-hover);
        }

        /* Mensajes de error */
        .text-danger {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--color-error);
        }

        /* Estilo de la tarjeta */
        .card {
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: var(--color-fondo);
        }

        /* Encabezados */
        .header-title {
            font-size: 1.5rem;
            color: var(--color-primario);
        }

        /* Mejoras en espaciado */
        .form-group {
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Cursos</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.cursos.index') }}">Cursos</a></li>
                        <li><span>Crear</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 text-right">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card shadow-lg border-light">
                    <div class="card-body">
                        <h4 class="header-title">Crear Nuevo Curso</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.cursos.store') }}" method="POST">
                            @csrf

                            <!-- Nombre del Curso -->
                            <div class="form-group">
                                <label for="nombre">Nombre del Curso</label>
                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control" required>
                                @error('nombre')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <!-- Descripción del Curso -->
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4" class="form-control" required>{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <!-- Fecha de Inicio -->
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de Inicio</label>
                                <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}" class="form-control" required>
                                @error('fecha_inicio')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <!-- Fecha de Fin -->
                            <div class="form-group">
                                <label for="fecha_fin">Fecha de Fin</label>
                                <input type="date" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}" class="form-control" required>
                                @error('fecha_fin')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Crear Curso</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
