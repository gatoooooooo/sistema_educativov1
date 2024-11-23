<!-- sidebar menu area start -->
@php
    $usr = Auth::guard('admin')->user();
@endphp
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">Admin</h2>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif
                    <!-- Gestión de Personas -->
                    @if ($usr->can('estudiantes.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                        Gestión de Personas
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.estudiantes.create') || Route::is('admin.estudiantes.index') || Route::is('admin.estudiantes.edit') || Route::is('admin.estudiantes.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.estudiantes.index')  || Route::is('admin.estudiantes.edit') ? 'active' : '' }}"><a href="{{ route('admin.estudiantes.index') }}">estudiantes</a></li>
                            @endif
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.docentes.index')  || Route::is('admin.docentes.edit') ? 'active' : '' }}"><a href="{{ route('admin.docentes.index') }}">docentes</a></li>
                            @endif
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.asistenci.index')  || Route::is('admin.asistencias.edit') ? 'active' : '' }}"><a href="{{ route('admin.asistencias.index') }}">asistencias estudiante</a></li>
                            @endif
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.asistenci.index')  || Route::is('admin.asistencias.edit') ? 'active' : '' }}"><a href="{{ route('admin.asistencias.index') }}">asistencias docente</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    <!-- Gestión Académica -->
                    @if ($usr->can('notas.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                        Gestión Académica
                        </span></a>

                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.promedios.index')  || Route::is('admin.promedios.edit') ? 'active' : '' }}"><a href="{{ route('admin.promedios.index') }}">promedios</a></li>
                            @endif
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.cursos.index')  || Route::is('admin.cursos.edit') ? 'active' : '' }}"><a href="{{ route('admin.cursos.index') }}">cursos</a></li>
                            @endif


                        </ul>
                    </li>
                    @endif

                    <!-- Gestión Administrativa -->
                    @if ($usr->can('notas.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                        Gestión Administrativa
                        </span></a>

                        </ul>
                    </li>
                    @endif

                    <!-- Gestión Comunicaciones  -->
                    @if ($usr->can('mensajes.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                        Gestión Comunicaciones
                        </span></a>

                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('men.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif
                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    <!-- Agregar Registro Horario -->
                    @if ($usr->can('registro-horario.view') || $usr->can('registro-horario.create'))
                    <li>
                        <a href="{{ route('registro-horario.index') }}" aria-expanded="true"><i class="fa fa-calendar"></i><span>
                            Registro Horario
                        </span></a>
                    </li>
                    @endif

                    <!-- Agregar Registro Curso -->
                    @if ($usr->can('registro-curso.view') || $usr->can('registro-curso.create'))
                    <li>
                        <a href="{{ route('registro-curso.index') }}" aria-expanded="true"><i class="fa fa-book"></i><span>
                            Registro Curso
                        </span></a>
                    </li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
