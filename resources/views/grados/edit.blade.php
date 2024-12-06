@extends('backend.layouts.master')

@section('title')
    Editar Grado - Panel de Administración
@endsection

@section('styles')
    <!-- Agregar estilos si es necesario -->
    <style>
        .form-control {
            display: inline-block;
            width: calc(100% - 40px);
            padding-left: 30px;
            position: relative;
        }

        .form-control i {
            position: absolute;
            left: 10px;
            top: 10px;
            color: #ccc;
        }

        /* Centrar los botones */
        .button-group {
            display: flex;
            justify-content: center; /* Centra los botones horizontalmente */
            gap: 10px; /* Espacio entre los botones */
            margin-top: 20px; /* Añadir un pequeño margen superior */
        }

        .btn {
            font-size: 1rem;
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
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
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
                                </div>

                                <!-- Descripción del Grado -->
                                <div class="col-md-8 mb-3">
                                    <label for="descripcion"><i class="fa fa-comment"></i> Descripción</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion', $grado->descripcion) }}</textarea>
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
