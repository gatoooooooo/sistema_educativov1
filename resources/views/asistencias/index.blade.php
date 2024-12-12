@extends('backend.layouts.master')

@section('title', 'Lista de Asistencias de Estudiantes')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
    <div class="container">
        <h1>Listado de Asistencias de Estudiantes</h1>
        <a href="{{ route('admin.asistencias.create') }}" class="btn btn-primary mb-3">Registrar Asistencia</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        

        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>  <!-- Nueva columna para el estado -->
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia->id }}</td>
                    <td>{{ $asistencia->estudiante->nombre_completo }}</td>
                    <td>{{ $asistencia->curso->nombre }}</td>
                    <td>{{ $asistencia->fecha }}</td>
                    <td>{{ $asistencia->hora }}</td>
                    <td>
                        <!-- Mostrar el estado de la asistencia -->
                        @if($asistencia->estado == 'presente')
                            <span class="badge badge-success">Presente</span>
                        @elseif($asistencia->estado == 'ausente')
                            <span class="badge badge-danger">Ausente</span>
                        @elseif($asistencia->estado == 'justificado')
                            <span class="badge badge-warning">Justificado</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.asistencias.edit', $asistencia->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.asistencias.destroy', $asistencia->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta asistencia?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay asistencias registradas.</td>  <!-- Actualizado a 7 columnas -->
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                responsive: true,
                autoWidth: false
            });
        });
    </script>
@endsection
