@extends('backend.layouts.master')

@section('title')
    Secciones - Panel de Administración
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">

    <style>
        .seccion-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
        }

        /* Estilo para las filas de estudiantes */
        .details-control {
            cursor: pointer;
        }

        .child-row {
            background-color: #f5f5f5;
        }

        .form-group {
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Secciones</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Secciones</span></li>
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
                <p class="float-right mb-2">
                    <a class="btn btn-primary text-white" href="{{ route('admin.secciones.create') }}">Crear nueva sección</a>
                </p>

                <div class="row">
                    @foreach ($secciones as $seccion)
                        <div class="col-md-4">
                            <div class="seccion-card">
                                <h5>Sección: {{ $seccion->nombre }}</h5>
                                <p><strong>ID:</strong> {{ $seccion->id }}</p>
                                <p><strong>Capacidad:</strong> {{ $seccion->capacidad }}</p>
                                <p><strong>Curso:</strong> {{ $seccion->curso->nombre }}</p>
                                <p><strong>Docente:</strong> {{ $seccion->docente->nombre }}</p>
                                <p><strong>Horario:</strong> {{ $seccion->horario->hora }}</p>

                                <p><strong>Estudiantes:</strong></p>
                                <table id="student-table-{{ $seccion->id }}" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre del Estudiante</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($seccion->estudiantes as $index => $estudiante)
                                        <tr class="details-control" data-id="{{ $estudiante->id }}">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $estudiante->nombre }}</td>
                                            <td>
                                                <form action="{{ route('admin.secciones.eliminarEstudiante', [$seccion->id, $estudiante->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr class="child-row" style="display: none;">
                                            <td colspan="3">
                                                <!-- Aquí puedes poner más detalles del estudiante si lo deseas -->
                                                <p>Detalles del estudiante {{ $estudiante->nombre }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <!-- Barra de acciones con botones -->
                                <div class="action-buttons">
                                    <a href="{{ route('admin.secciones.edit', $seccion->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                    <!-- Formulario para eliminar la sección -->
                                    <form action="{{ route('admin.secciones.destroy', $seccion->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta sección?')">Eliminar Sección</button>
                                    </form>
                                </div>

                                <!-- Sección para agregar estudiantes -->
                                <div class="student-actions">
                                    <form action="{{ route('admin.secciones.agregarEstudiante', $seccion->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <select name="estudiantes[]" class="form-control" multiple required>
                                                @foreach ($estudiantes as $estudiante)
                                                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-sm">Agregar Estudiante</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

        // Activar expansión de fila de estudiantes


        // Función para generar un color aleatorio
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Asignar colores aleatorios a las tarjetas de las secciones
        document.querySelectorAll('.seccion-card').forEach(function(card) {
            card.style.backgroundColor = getRandomColor();
        });
    </script>
@endsection
