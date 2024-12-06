@extends('backend.layouts.master')

@section('title')
    Crear Sección - Panel de Administración
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
                    <h4 class="page-title pull-left">Crear Sección</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.secciones.index') }}">Secciones</a></li>
                        <li><span>Crear</span></li>
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
                        <h4 class="header-title">Crear Sección</h4>

                        <form action="{{ route('admin.secciones.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre de la Sección</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="curso_id">Curso</label>
                                <select name="curso_id" id="curso_id" class="form-control" required>
                                    @foreach ($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="docente_id">Docente</label>
                                <select name="docente_id" id="docente_id" class="form-control" required>
                                    @foreach ($docentes as $docente)
                                        <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="horario_id">Horario</label>
                                <select name="horario_id" id="horario_id" class="form-control" required>
                                    @foreach ($horarios as $horario)
                                        <option value="{{ $horario->id }}">{{ $horario->hora }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="capacidad">Capacidad</label>
                                <input type="number" name="capacidad" id="capacidad" class="form-control" value="{{ old('capacidad') }}" required min="1">
                            </div>

                            <div class="form-group">
                                <label for="estudiantes">Estudiantes</label>
                                <select name="estudiantes[]" id="estudiantes" class="form-control" multiple required>
                                    @foreach ($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Crear Sección</button>
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
