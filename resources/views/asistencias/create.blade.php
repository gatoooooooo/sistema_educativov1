@extends('backend.layouts.master')

@section('title', 'Registrar Asistencia')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Asistencias</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.asistencias.index') }}">Asistencias</a></li>
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
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Registrar Nueva Asistencia</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.asistencias.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="estudiante_id">Estudiante</label>
                                <select name="estudiante_id" id="estudiante_id" class="form-control" required>
                                    <option value="">Seleccione un estudiante</option>
                                    @foreach($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
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

                            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
