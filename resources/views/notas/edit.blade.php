@extends('backend.layouts.master')

@section('title', 'Editar Nota')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Notas</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.notas.index') }}">Notas</a></li>
                        <li><span>Editar</span></li>
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
                        <h4 class="header-title">Editar Nota</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.notas.update', $nota->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="registro_estudiante_id">Estudiante</label>
                                <select name="registro_estudiante_id" id="registro_estudiante_id" class="form-control" required>
                                    <option value="">Seleccione un estudiante</option>
                                    @foreach($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}" 
                                            {{ $nota->registro_estudiante_id == $estudiante->id ? 'selected' : '' }}>
                                            {{ $estudiante->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="curso_id">Curso</label>
                                <select name="curso_id" id="curso_id" class="form-control" required>
                                    <option value="">Seleccione un curso</option>
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->id }}" 
                                            {{ $nota->curso_id == $curso->id ? 'selected' : '' }}>
                                            {{ $curso->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nota1">Nota 1</label>
                                <input type="number" step="0.01" name="nota1" id="nota1" class="form-control" value="{{ $nota->nota1 }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nota2">Nota 2</label>
                                <input type="number" step="0.01" name="nota2" id="nota2" class="form-control" value="{{ $nota->nota2 }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nota3">Nota 3</label>
                                <input type="number" step="0.01" name="nota3" id="nota3" class="form-control" value="{{ $nota->nota3 }}" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $nota->fecha }}" required>
                            </div>

                            <div class="form-group">
                                <label for="comentarios">Comentarios</label>
                                <textarea name="comentarios" id="comentarios" class="form-control">{{ $nota->comentarios }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Actualizar Nota</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
