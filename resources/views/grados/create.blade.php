@extends('backend.layouts.master')

@section('title')
    Crear Grado - Panel de Administración
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
                <h4 class="page-title pull-left">Crear Grado</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.grados.index') }}">Grados</a></li>
                    <li><span>Crear Grado</span></li>
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
                        <h4 class="header-title text-center">Crear Grado</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.grados.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre del Grado:</label>
                                <input required type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
                                @error('nombre')
                                <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción (Opcional):</label>
                                <textarea name="descripcion" id="descripcion" rows="3" class="form-control">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
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
            // Inicializar Select2 (si se agregan selectores en un futuro)
            $('.select2').select2({
                width: '100%'
            });
        });
    </script>
@endsection
