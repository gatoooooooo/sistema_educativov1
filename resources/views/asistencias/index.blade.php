@extends('backend.layouts.master')

@section('title', 'Lista de Estudiantes')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
    <h1>Listado de Asistencias</h1>
    <a href="{{ route('admin.asistencias.create') }}" class="btn btn-primary">Registrar Asistencia</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Estudiante</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia->id }}</td>
                    <td>{{ $asistencia->estudiante ? $asistencia->estudiante->nombre : 'Sin asistencia' }}</td>                    <td>{{ $asistencia->fecha }}</td>
                    <td>{{ $asistencia->estado }}</td>
                    <td>
                        <a href="{{ route('admin.asistencias.edit', $asistencia->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.asistencias.destroy', $asistencia->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
