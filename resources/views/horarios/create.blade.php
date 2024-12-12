@extends('backend.layouts.master')

@section('title', 'Crear Horario - Panel de Administración')

@section('admin-content')
<!-- Page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Crear Horario</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.horarios.index') }}">Horarios</a></li>
                    <li><span>Crear Nuevo Horario</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- Page title area end -->

<div class="main-content-inner">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">
                    <h4 class="header-title text-gray-700 mb-4">Crear Nuevo Horario</h4>

                    <form action="{{ route('admin.horarios.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
<<<<<<< HEAD
                            <label for="curso_id" class="font-weight-bold text-dark">Curso</label>
=======
                            <label for="curso_id">Curso</label>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                            <select name="curso_id" id="curso_id" class="form-control @error('curso_id') is-invalid @enderror">
                                <option value="">Seleccione un Curso</option>
                                @foreach ($cursos as $curso)
                                    <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>{{ $curso->nombre }}</option>
                                @endforeach
                            </select>
                            @error('curso_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
<<<<<<< HEAD
                            <label for="dia" class="font-weight-bold text-dark">Día</label>
=======
                            <label for="dia">Día</label>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                            <input type="text" name="dia" id="dia" class="form-control @error('dia') is-invalid @enderror" value="{{ old('dia') }}">
                            @error('dia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
<<<<<<< HEAD
                            <label for="hora_inicio" class="font-weight-bold text-dark">Hora de Inicio</label>
=======
                            <label for="hora_inicio">Hora de Inicio</label>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control @error('hora_inicio') is-invalid @enderror" value="{{ old('hora_inicio') }}">
                            @error('hora_inicio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
<<<<<<< HEAD
                            <label for="hora_fin" class="font-weight-bold text-dark">Hora de Fin</label>
=======
                            <label for="hora_fin">Hora de Fin</label>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                            <input type="time" name="hora_fin" id="hora_fin" class="form-control @error('hora_fin') is-invalid @enderror" value="{{ old('hora_fin') }}">
                            @error('hora_fin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
<<<<<<< HEAD
                            <label for="hora_recreo" class="font-weight-bold text-dark">Hora de Recreo (opcional)</label>
=======
                            <label for="hora_recreo">Hora de Recreo (opcional)</label>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                            <input type="time" name="hora_recreo" id="hora_recreo" class="form-control @error('hora_recreo') is-invalid @enderror" value="{{ old('hora_recreo') }}">
                            @error('hora_recreo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

<<<<<<< HEAD
                        <button type="submit" class="btn btn-primary mt-3">Crear Horario</button>
                        <a href="{{ route('admin.horarios.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
=======
                        <button type="submit" class="btn btn-primary">Crear Horario</button>
                        <a href="{{ route('admin.horarios.index') }}" class="btn btn-secondary">Cancelar</a>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .form-control {
        border-radius: 8px;
        padding: 10px;
<<<<<<< HEAD
        background-color: #f8f9fa;
    }

    .form-control:focus {
        border-color: #3490dc;
        box-shadow: 0 0 5px rgba(52, 144, 220, 0.5);
=======
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
    }

    .btn {
        border-radius: 5px;
        font-size: 1rem;
<<<<<<< HEAD
        padding: 10px 20px;
=======
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
    }

    .btn-primary {
        background-color: #3490dc;
        border-color: #3490dc;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .invalid-feedback {
        color: #e74c3c;
<<<<<<< HEAD
        font-size: 0.875rem;
=======
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
    }

    .card {
        border-radius: 10px;
        border: 1px solid #e2e8f0;
<<<<<<< HEAD
        padding: 20px;
    }

    .card-body {
        padding: 25px;
    }

    .header-title {
        font-size: 1.5rem;
        font-weight: 500;
        color: #333;
=======
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
    }
</style>
@endsection
