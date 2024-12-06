@extends('backend.layouts.master')

@section('title')
    Editar Estudiante - Panel de Administración
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Editar Estudiante</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.estudiantes.index') }}">Estudiantes</a></li>
                        <li><span>Editar Estudiante</span></li>
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
                        <h4 class="header-title">Formulario para Editar Estudiante</h4>

                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.estudiantes.update', $estudiante->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $estudiante->nombre) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', $estudiante->apellido) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $estudiante->direccion) }}">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $estudiante->telefono) }}">
                            </div>

                            <div class="form-group">
                                <label for="correo_electronico">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="{{ old('correo_electronico', $estudiante->correo_electronico) }}">
                            </div>

                            <div class="form-group">
                                <label for="grado_id">Grado</label>
                                <select class="form-control" id="grado_id" name="grado_id" required>
                                    @foreach($grados as $grado)
                                        <option value="{{ $grado->id }}" {{ $grado->id == $estudiante->grado_id ? 'selected' : '' }}>{{ $grado->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fecha_ingreso">Fecha de Ingreso</label>
                                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{ old('fecha_ingreso', $estudiante->fecha_ingreso) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="documento_tipo">Tipo de Documento</label>
                                <select class="form-control" id="documento_tipo" name="documento_tipo" required>
                                    <option value="DNI" {{ old('documento_tipo', $estudiante->documento_tipo) == 'DNI' ? 'selected' : '' }}>DNI</option>
                                    <option value="Carnet de extranjería" {{ old('documento_tipo', $estudiante->documento_tipo) == 'Carnet de extranjería' ? 'selected' : '' }}>Carnet de extranjería</option>
                                    <option value="Pasaporte" {{ old('documento_tipo', $estudiante->documento_tipo) == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                                    <option value="Otro" {{ old('documento_tipo', $estudiante->documento_tipo) == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="documento_numero">Número de Documento</label>
                                <input type="text" class="form-control" id="documento_numero" name="documento_numero" value="{{ old('documento_numero', $estudiante->documento_numero) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="genero">Género</label>
                                <select class="form-control" id="genero" name="genero" required>
                                    <option value="masculino" {{ old('genero', $estudiante->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ old('genero', $estudiante->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
                            <a href="{{ route('admin.estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
@endsection
