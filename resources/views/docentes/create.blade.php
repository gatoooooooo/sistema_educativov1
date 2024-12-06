@extends('backend.layouts.master')

@section('title', 'Crear Nuevo Docente')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Docentes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.docentes.index') }}">Docentes</a></li>
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
                        <h4 class="header-title">Crear Nuevo Docente</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.docentes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="correo_electronico">Correo Electrónico</label>
                                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" value="{{ old('correo_electronico') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
                            </div>
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" name="dni" id="dni" class="form-control" value="{{ old('dni') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
