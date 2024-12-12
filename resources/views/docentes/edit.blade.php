@extends('backend.layouts.master')

@section('title', 'Editar Docente')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Docentes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.docentes.index') }}">Docentes</a></li>
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
<<<<<<< HEAD
            <div class="col-lg-8 offset-lg-2 mt-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="header-title mb-4 text-center text-primary">Editar Docente</h4>
=======
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Editar Docente</h4>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.docentes.update', $docente->id) }}" method="POST">
                            @csrf
                            @method('PUT')

<<<<<<< HEAD
                            <div class="form-group mb-3">
                                <label for="nombre" class="font-weight-bold">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control rounded" placeholder="Ingrese el nombre" value="{{ $docente->nombre }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="apellido" class="font-weight-bold">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control rounded" placeholder="Ingrese el apellido" value="{{ $docente->apellido }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="correo_electronico" class="font-weight-bold">Correo Electrónico</label>
                                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control rounded" placeholder="ejemplo@correo.com" value="{{ $docente->correo_electronico }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="direccion" class="font-weight-bold">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control rounded" placeholder="Ingrese la dirección" value="{{ $docente->direccion }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="telefono" class="font-weight-bold">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control rounded" placeholder="Ingrese el teléfono" value="{{ $docente->telefono }}">
                            </div>

                            <div class="form-group mb-4">
                                <label for="dni" class="font-weight-bold">DNI</label>
                                <input type="text" name="dni" id="dni" class="form-control rounded" placeholder="Ingrese el DNI" value="{{ $docente->dni }}" required>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-lg mr-2">Actualizar</button>
                                <a href="{{ route('admin.docentes.index') }}" class="btn btn-secondary btn-lg">Cancelar</a>
                            </div>
=======
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $docente->nombre }}" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $docente->apellido }}" required>
                            </div>
                            <div class="form-group">
                                <label for="correo_electronico">Correo Electrónico</label>
                                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" value="{{ $docente->correo_electronico }}" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $docente->direccion }}">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $docente->telefono }}">
                            </div>
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" name="dni" id="dni" class="form-control" value="{{ $docente->dni }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Actualizar Docente</button>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
