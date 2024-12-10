@extends('backend.layouts.master')

@section('title', 'Registrar Fecha de Pago - Panel de Administración')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Fecha de Pago</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.fecha_pagos.index') }}">Fecha de Pago</a></li>
                        <li><span>Registrar</span></li>
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
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Registrar Fecha de Pago</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.fecha_pagos.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="fecha_pago">Fecha de Pago:</label>
                                <input type="date" name="fecha_pago" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tipo_matricula">Tipo de Matrícula:</label>
                                <select name="tipo_matricula" class="form-control" required>
                                    <option value="Primera">Primera</option>
                                    <option value="Segunda">Segunda</option>
                                    <option value="Tercera">Tercera</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
