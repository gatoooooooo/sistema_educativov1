<!-- resources/views/backend/estudiantes/show.blade.php -->

@extends('backend.layouts.master')

@section('title')
    Detalles del Estudiante - Panel de Administración
@endsection

@section('styles')
    <style>
        .student-detail {
            margin-top: 20px;
        }
    </style>
@endsection

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Detalles del Estudiante</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.estudiantes.index') }}">Estudiantes</a></li>
                        <li><span>Detalles del Estudiante</span></li>
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
                        <h4 class="header-title">Detalles del Estudiante</h4>

                        <div class="student-detail">
                            <table class="table">
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{ $estudiante->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Apellido</th>
                                    <td>{{ $estudiante->apellido }}</td>
                                </tr>
                                <tr>
                                    <th>Tipo de Documento</th>
                                    <td>{{ $estudiante->documento_tipo }}</td>
                                </tr>
                                <tr>
                                    <th>Número de Documento</th>
                                    <td>{{ $estudiante->documento_numero }}</td>
                                </tr>
                                <tr>
                                    <th>Grado</th>
                                    <td>{{ $estudiante->grado->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Fecha de Ingreso</th>
                                    <td>{{ $estudiante->fecha_ingreso }}</td>
                                </tr>
                                <tr>
                                    <th>Género</th>
                                    <td>{{ ucfirst($estudiante->genero) }}</td>
                                </tr>
                                <tr>
                                    <th>Fecha de Nacimiento</th>
                                    <td>{{ $estudiante->fecha_nacimiento }}</td>
                                </tr>
                                <tr>
                                    <th>Dirección</th>
                                    <td>{{ $estudiante->direccion }}</td>
                                </tr>
                                <tr>
                                    <th>Teléfono</th>
                                    <td>{{ $estudiante->telefono }}</td>
                                </tr>
                                <tr>
                                    <th>Correo Electrónico</th>
                                    <td>{{ $estudiante->correo_electronico }}</td>
                                </tr>
                            </table>
                        </div>

                        <a href="{{ route('admin.estudiantes.index') }}" class="btn btn-secondary">Volver a la lista de estudiantes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
