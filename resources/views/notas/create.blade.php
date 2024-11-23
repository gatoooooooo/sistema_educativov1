@extends('backend.layouts.master')

@section('title', 'Crear Nota')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Notas</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.notas.index') }}">Notas</a></li>
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
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Crear Nueva Nota</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.notas.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="registro_estudiante_id">Estudiante</label>
                                <select name="registro_estudiante_id" id="registro_estudiante_id" class="form-control" required>
                                    <option value="">Seleccione un estudiante</option>
                                    @foreach($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="curso_id">Curso</label>
                                <select name="curso_id" id="curso_id" class="form-control" required>
                                    <option value="">Seleccione un curso</option>
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nota1">Nota 1</label>
                                <input type="number" name="nota1" id="nota1" class="form-control" min="0" max="20" step="0.1" required>
                            </div>

                            <div class="form-group">
                                <label for="nota2">Nota 2</label>
                                <input type="number" name="nota2" id="nota2" class="form-control" min="0" max="20" step="0.1" required>
                            </div>

                            <div class="form-group">
                                <label for="nota3">Nota 3</label>
                                <input type="number" name="nota3" id="nota3" class="form-control" min="0" max="20" step="0.1" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="comentarios">Comentarios</label>
                                <textarea name="comentarios" id="comentarios" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Guardar Nota</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
