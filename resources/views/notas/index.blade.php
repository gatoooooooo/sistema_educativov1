@extends('backend.layouts.master')

@section('title', 'Lista de Estudiantes')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
<div class="container">
    <h1>Notas</h1>
    <a href="{{ route('admin.notas.create') }}" class="btn btn-primary">Agregar Nota</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Fecha</th>
                <th>Comentarios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $nota)
                <tr>
                    <!-- Acceder correctamente a la relación 'registroEstudiante' -->
                    <td>{{ $nota->estudiante->nombre }} {{ $nota->estudiante->apellido }}</td>
                    <td>{{ $nota->curso->nombre }}</td>
                    <td>{{ $nota->nota1 }}</td>
                    <td>{{ $nota->nota2 }}</td>
                    <td>{{ $nota->nota3 }}</td>
                    <td>{{ $nota->fecha }}</td>
                    <td>{{ $nota->comentarios }}</td>
                    <td>
                        <a href="{{ route('admin.notas.edit', $nota->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.notas.destroy', $nota->id) }}" method="POST" style="display:inline-block;">
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