@extends('backend.layouts.master')

@section('title', 'Fechas de Pago')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
<div class="container">
    <h1>Fechas de Pago</h1>
    <a href="{{ route('admin.fecha_pagos.create') }}" class="btn btn-success mb-3">Registrar Fecha de Pago</a>

    <table id="dataTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de Pago</th>
                <th>Tipo de Matrícula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fechas_pagos as $pago)
                <tr>
                    <td>{{ $pago->id }}</td>
                    <td>{{ $pago->fecha_pago }}</td>
                    <td>{{ $pago->tipo_matricula }}</td>
                    <td>
                        <a href="{{ route('admin.fecha_pagos.edit', $pago->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.fecha_pagos.destroy', $pago->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta fecha de pago?')">Eliminar</button>
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
