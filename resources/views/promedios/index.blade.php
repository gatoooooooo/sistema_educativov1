@extends('backend.layouts.master')

@section('title', 'Lista de Estudiantes')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
<div class="container">
    <h1>Promedios</h1>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Promedio Final</th>
                <th>Fecha de Cálculo</th>
                <th>Comentarios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promedios as $promedio)
                <tr>
                    <td>{{ $promedio->estudiante->nombre }} {{ $promedio->estudiante->apellido }}</td>
                    <td>{{ $promedio->curso->nombre }}</td>
                    <td>{{ $promedio->promedio_final }}</td>
                    <td>{{ $promedio->fecha_calculo }}</td>
                    <td>{{ $promedio->comentarios }}</td>
                    <td>
                        <a href="{{ route('admin.promedios.generar', ['registroEstudianteId' => $promedio->registro_estudiante_id, 'cursoId' => $promedio->curso_id]) }}" class="btn btn-success">Generar Promedio</a>
                        <!-- Agregar el botón para eliminar el promedio -->
                        <form action="{{ route('admin.promedios.destroy', $promedio->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
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
