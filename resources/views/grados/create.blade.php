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
    <style>
        /* Colores institucionales */
        :root {
            --color-primario: #004C97; /* Color institucional (puedes cambiarlo según el color específico) */
            --color-secundario: #F0F0F0;
        }

        /* Mejorar los cuadros de los campos */
        .form-control, .form-select, textarea {
            border-radius: 8px;
            border: 2px solid #ccc;
            background-color: var(--color-secundario);
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus, textarea:focus {
            border-color: var(--color-primario);
            box-shadow: 0 0 5px rgba(0, 76, 151, 0.6);
            outline: none;
        }

        /* Mejorar el botón */
        .btn-success {
            background-color: var(--color-primario);
            border-color: var(--color-primario);
            border-radius: 50px;
        }

        .btn-success:hover {
            background-color: #003B7A; /* color más oscuro para el hover */
            border-color: #003B7A;
        }

        /* Estilo para los mensajes de error */
        .text-danger {
            font-size: 0.875rem;
            font-weight: 600;
        }

        /* Mejorar el card */
        .card {
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Títulos y subtítulos */
        .header-title {
            font-size: 1.5rem;
            color: var(--color-primario);
        }
    </style>
@endsection

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Crear Grado</h4>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.grados.index') }}">Grados</a></li>
                    <li><span>Crear Grado</span></li>
                </ul>
            </div>
            <div class="col-sm-6 text-right">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>

    <div class="main-content-inner mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-light">
                    <div class="card-body">
                        <h4 class="header-title text-center mb-4">Crear Grado</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.grados.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre" class="font-weight-bold">Nombre del Grado:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required aria-describedby="nombreHelp">
                                @error('nombre')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                                <small id="nombreHelp" class="form-text text-muted">Ingrese el nombre del grado.</small>
                            </div>

                            <div class="form-group">
                                <label for="descripcion" class="font-weight-bold">Descripción (Opcional):</label>
                                <textarea name="descripcion" id="descripcion" rows="3" class="form-control" aria-describedby="descripcionHelp">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                                <small id="descripcionHelp" class="form-text text-muted">Proporcione una descripción breve del grado.</small>
                            </div>

                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fas fa-save"></i> Guardar
                                </button>
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
            // Inicializar Select2 si se agregan selectores en el futuro
            $('.select2').select2({
                width: '100%'
            });
        });
    </script>
@endsection
