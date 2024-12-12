@extends('backend.layouts.master')

@section('title')
    Editar Grado - Panel de Administración
@endsection

@section('styles')
<<<<<<< HEAD
    <!-- Agregar estilos mejorados -->
    <style>
        /* Colores institucionales */
        :root {
            --color-primario: #004C97; /* Color institucional */
            --color-secundario: #F0F0F0;
            --color-hover: #003B7A;
        }

        /* Mejorar los cuadros de los campos */
        .form-control, .form-select, textarea {
            border-radius: 8px;
            border: 2px solid #ccc;
            background-color: var(--color-secundario);
            padding-left: 30px; /* espacio para el ícono */
            position: relative;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus, textarea:focus {
            border-color: var(--color-primario);
            box-shadow: 0 0 5px rgba(0, 76, 151, 0.6);
            outline: none;
        }

        /* Íconos dentro de los campos */
=======
    <!-- Agregar estilos si es necesario -->
    <style>
        .form-control {
            display: inline-block;
            width: calc(100% - 40px);
            padding-left: 30px;
            position: relative;
        }

>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
        .form-control i {
            position: absolute;
            left: 10px;
            top: 10px;
            color: #ccc;
        }

<<<<<<< HEAD
        /* Mejorar los botones */
        .btn-success {
            background-color: var(--color-primario);
            border-color: var(--color-primario);
            border-radius: 50px;
        }

        .btn-success:hover {
            background-color: var(--color-hover);
            border-color: var(--color-hover);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 50px;
        }

        .btn-secondary:hover {
            background-color: #5a6368;
            border-color: #5a6368;
        }

        /* Agrupar botones centrados */
        .button-group {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        /* Mejorar la tarjeta */
        .card {
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Títulos */
        .header-title {
            font-size: 1.5rem;
            color: var(--color-primario);
        }

        /* Mensajes de error */
        .text-danger {
            font-size: 0.875rem;
=======
        /* Centrar los botones */
        .button-group {
            display: flex;
            justify-content: center; /* Centra los botones horizontalmente */
            gap: 10px; /* Espacio entre los botones */
            margin-top: 20px; /* Añadir un pequeño margen superior */
        }

        .btn {
            font-size: 1rem;
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
            font-weight: 600;
        }
    </style>
@endsection

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Editar Grado</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.grados.index') }}">Grados</a></li>
                        <li><span>Editar Grado</span></li>
                    </ul>
                </div>
            </div>
<<<<<<< HEAD
            <div class="col-sm-6 text-right">
=======
            <div class="col-sm-6 clearfix">
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
<<<<<<< HEAD
                <div class="card shadow-lg border-light">
=======
                <div class="card">
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                    <div class="card-body">
                        <h4 class="header-title">Editar Grado: {{ $grado->nombre }}</h4>

                        <!-- Formulario de edición del grado -->
                        <form action="{{ route('admin.grados.update', $grado->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Nombre del Grado -->
                                <div class="col-md-4 mb-3">
                                    <label for="nombre"><i class="fa fa-cogs"></i> Nombre del Grado</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control"
                                           value="{{ old('nombre', $grado->nombre) }}" required>
<<<<<<< HEAD
                                    @error('nombre')
                                        <small class="text-danger">{{ '*' . $message }}</small>
                                    @enderror
=======
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                                </div>

                                <!-- Descripción del Grado -->
                                <div class="col-md-8 mb-3">
                                    <label for="descripcion"><i class="fa fa-comment"></i> Descripción</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion', $grado->descripcion) }}</textarea>
<<<<<<< HEAD
                                    @error('descripcion')
                                        <small class="text-danger">{{ '*' . $message }}</small>
                                    @enderror
=======
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                                </div>

                                <div class="col-12">
                                    <!-- Grupo de botones centrados -->
                                    <div class="button-group">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Actualizar Grado</button>
                                        <a href="{{ route('admin.grados.index') }}" class="btn btn-secondary"><i class="fa fa-times"></i> Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Agregar scripts si es necesario -->
@endsection
