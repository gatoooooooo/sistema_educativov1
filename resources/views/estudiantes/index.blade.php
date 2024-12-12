@extends('backend.layouts.master')

@section('title')
    Estudiantes - Panel de Administración
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <style>
        .table th, .table td {
            vertical-align: middle;
        }
        .icon-column {
            width: 50px;
            text-align: center;
        }
        .badge-success {
            background-color: #28a745;
        }
        .badge-danger {
            background-color: #dc3545;
        }
    </style>
@endsection

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Estudiantes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Estudiantes</span></li>
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
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="{{ route('admin.estudiantes.create') }}">Crear nuevo estudiante</a>
                        </p>

                        @include('backend.layouts.partials.messages')

                        <div class="data-tables">
                            <table id="data-Table" class="table table-striped table-hover table-bordered">
                                <thead class="bg-primary text-white border-bottom">
                                <tr>
                                    <th class="icon-column">Nombre</th>
                                    <th class="icon-column">Apellido</th>
                                    <th class="icon-column">Número de Documento</th>
                                    <th class="icon-column">Grado</th>
                                    <th class="icon-column">Fecha de Ingreso</th>
                                    <th class="icon-column">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($estudiantes as $estudiante)
                                    <tr>
                                        <td>{{ $estudiante->nombre }}</td>
                                        <td>{{ $estudiante->apellido }}</td>
                                        <td>
                                            {{ $estudiante->documento_tipo }} - {{ $estudiante->documento_numero }}
                                        </td>
                                        <td>{{ $estudiante->grado->nombre }}</td>
                                        <td>{{ $estudiante->fecha_ingreso }}</td>
                                        <td>
                                            <a href="{{ route('admin.estudiantes.edit', $estudiante->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Editar
                                            </a>
                                            <a href="{{ route('admin.estudiantes.show', $estudiante->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> Ver
                                            </a>
                                            <form action="{{ route('admin.estudiantes.destroy', $estudiante->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">
                                                    <i class="fa fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
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
    <script>
        if ($('#data-Table').length) {
            $('#data-Table').DataTable({
                responsive: true
            });
        }
    </script>
@endsection
