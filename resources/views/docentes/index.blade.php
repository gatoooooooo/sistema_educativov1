@extends('backend.layouts.master')

@section('title', 'Lista de Docentes')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection

@section('admin-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Docentes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Todos los Docentes</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- page title area end -->

    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Lista de Docentes</h4>
                        <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{ route('admin.docentes.create') }}">Crear Nuevo Docente</a>
                        </p>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="5%">Sl</th>
                                        <th width="15%">Nombre</th>
                                        <th width="15%">Apellido</th>
                                        <th width="20%">Correo Electrónico</th>
                                        <th width="15%">Teléfono</th>
                                        <th width="10%">DNI</th>
                                        <th width="10%">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docentes as $docente)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $docente->nombre }}</td>
                                            <td>{{ $docente->apellido }}</td>
                                            <td>{{ $docente->correo_electronico }}</td>
                                            <td>{{ $docente->telefono }}</td>
                                            <td>{{ $docente->dni }}</td>
                                            <td>
                                            <a class="btn btn-success text-white" href="{{ route('admin.docentes.edit', $docente->id) }}">Editar</a>

                                            <a class="btn btn-danger text-white" href="{{ route('admin.docentes.destroy', $docente->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $docente->id }}').submit();">
                                            Eliminar
                                            </a>

                                            <form id="delete-form-{{ $docente->id }}" action="{{ route('admin.docentes.destroy', $docente->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
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
            <!-- data table end -->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    
    <script>
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
    </script>
@endsection
