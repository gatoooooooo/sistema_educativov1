@extends('backend.layouts.master')

@section('title')
    Crear Estudiante - Panel de Administración
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endsection

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title pull-left">Crear Estudiante</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.estudiantes.index') }}">Estudiantes</a></li>
                    <li><span>Crear Estudiante</span></li>
                </ul>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4 class="header-title text-center">Crear Estudiante</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.estudiantes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input required type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
                                @error('nombre')
                                <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input required type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido') }}">
                                @error('apellido')
                                <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección (Opcional):</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}">
                                @error('direccion')
                                <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono (Opcional):</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
                                @error('telefono')
                                <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="correo_electronico">Correo Electrónico (Opcional):</label>
                                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" value="{{ old('correo_electronico') }}">
                                @error('correo_electronico')
                                <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="grado_id">Grado:</label>
                                        <select name="grado_id" id="grado_id" class="form-control select2" required>
                                            <option value="">Seleccionar grado</option>
                                            @foreach($grados as $grado)
                                                <option value="{{ $grado->id }}" {{ old('grado_id') == $grado->id ? 'selected' : '' }}>{{ $grado->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('grado_id')
                                        <small class="text-danger">{{ '*' . $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fecha_ingreso">Fecha de Ingreso:</label>
                                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" value="{{ old('fecha_ingreso') }}" required>
                                @error('fecha_ingreso')
                                <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="documento_tipo">Tipo de Documento</label>
                                <select class="form-control" id="documento_tipo" name="documento_tipo" required>
                                    <option value="DNI" {{ old('documento_tipo', $estudiante->documento_tipo ?? 'DNI') == 'DNI' ? 'selected' : '' }}>DNI</option>
                                    <option value="Carnet de extranjería" {{ old('documento_tipo', $estudiante->documento_tipo ?? 'DNI') == 'Carnet de extranjería' ? 'selected' : '' }}>Carnet de extranjería</option>
                                    <option value="Pasaporte" {{ old('documento_tipo', $estudiante->documento_tipo ?? 'DNI') == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                                    <option value="Otro" {{ old('documento_tipo', $estudiante->documento_tipo ?? 'DNI') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="documento_numero">Número de Documento:</label>
                                <input type="text" name="documento_numero" id="documento_numero" class="form-control" value="{{ old('documento_numero') }}" required>
                                @error('documento_numero')
                                <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="genero">Género:</label>
                                <select name="genero" id="genero" class="form-control" required>
                                    <option value="">Seleccionar género</option>
                                    <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                </select>
                                @error('genero')
                                <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
                                @error('fecha_nacimiento')
                                <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-lg">Guardar <i class="fas fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Inicializar Select2 para los selectores de grado
            $('.select2').select2({
                width: '100%'
            });
        });
    </script>
@endsection
