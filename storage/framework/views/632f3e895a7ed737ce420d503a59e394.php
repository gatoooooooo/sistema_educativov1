<!-- sidebar menu area start -->
<?php
    $usr = Auth::guard('admin')->user();
?>
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
        <img src="<?php echo e(asset('backend/assets/images/img/logo.png')); ?>" alt="Logo" style="width: 80px; height: 80px;">
            <a href="<?php echo e(route('admin.dashboard')); ?>">
                <h3 class="text-white">Sistema Educativo</h3>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    <?php if($usr->can('dashboard.view')): ?>
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(Route::is('admin.dashboard') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <!-- Gestión de Estudiantes -->
                    <?php if($usr->can('estudiantes.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete')): ?>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users"></i><span>
                        Gestión de Estudiantes
                        </span></a>
                        <ul class="collapse <?php echo e(Route::is('admin.estudiantes.create') || Route::is('admin.estudiantes.index') || Route::is('admin.estudiantes.edit') || Route::is('admin.estudiantes.show') ? 'in' : ''); ?>">
                            <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.estudiantes.index')  || Route::is('admin.estudiantes.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.estudiantes.index')); ?>">estudiantes</a></li>
                            <?php endif; ?>
                            <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.asistencias.index')  || Route::is('admin.asistencias.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.asistencias.index')); ?>">asistencias estudiante</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <!-- Gestión Docentes -->
                    <?php if($usr->can('estudiantes.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete')): ?>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users"></i><span>
                        Gestión de docentes
                        </span></a>
                        <ul class="collapse <?php echo e(Route::is('admin.docentes.create') || Route::is('admin.docentes.index') || Route::is('admin.docentes.edit') || Route::is('admin.docentes.show') ? 'in' : ''); ?>">

                            <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.docentes.index')  || Route::is('admin.docentes.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.docentes.index')); ?>">docentes</a></li>
                            <?php endif; ?>
                            <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.asistencias_docentes.index')  || Route::is('admin.asistencias_docentes.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.asistencias_docentes.index')); ?>">asistencias docente</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <!-- Gestión Académica -->
                    <?php if($usr->can('notas.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete')): ?>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-graduation-cap"></i><span>
                        Gestión Académica
                        </span></a>
                        <ul class="collapse <?php echo e(Route::is('admin.notas.create') || Route::is('admin.notas.index') || Route::is('admin.notas.edit') || Route::is('admin.notas.show') ? 'in' : ''); ?>">
                        <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.notas.index')  || Route::is('admin.notas.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.notas.index')); ?>">notas</a></li>
                            <?php endif; ?>
                            <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.promedios.index')  || Route::is('admin.promedios.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.promedios.index')); ?>">promedios</a></li>
                            <?php endif; ?>
                            <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.cursos.index')  || Route::is('admin.cursos.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.cursos.index')); ?>">cursos</a></li>
                            <?php endif; ?>
                            <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.horarios.index')  || Route::is('admin.horarios.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.horarios.index')); ?>">horarios</a></li>
                            <?php endif; ?>
                            <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.evaluaciones.index')  || Route::is('admin.evaluaciones.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.evaluaciones.index')); ?>">evaluaciones</a></li>
                            <?php endif; ?>
                            <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.secciones.index')  || Route::is('admin.secciones.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.secciones.index')); ?>">secciones</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <!-- Gestión Administrativa -->
                    <?php if($usr->can('notas.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete')): ?>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                        Gestión Administrativa
                        </span></a>
                        <ul class="collapse <?php echo e(Route::is('admin.pagos.create') || Route::is('admin.pagos.index') || Route::is('admin.pagos.edit') || Route::is('admin.pagos.show') ? 'in' : ''); ?>">
                        <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.pagos.index')  || Route::is('admin.pagos.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.pagos.index')); ?>">pagos</a></li>
                            <?php endif; ?>
                            <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.fecha_pagos.index')  || Route::is('admin.fecha_pagos.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.fecha_pagos.index')); ?>">fecha de pagos</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <!-- Gestión Comunicaciones  -->
                    <?php if($usr->can('mensajes.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete')): ?>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-comments"></i><span>
                        Gestión Comunicaciones
                        </span></a>
                        <ul class="collapse <?php echo e(Route::is('admin.mensajes.create') || Route::is('admin.mensajes.index') || Route::is('admin.mensajes.edit') || Route::is('admin.mensajes.show') ? 'in' : ''); ?>">
                        <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.mensajes.index')  || Route::is('admin.mensajes.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.mensajes.index')); ?>">mensajes</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete')): ?>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse <?php echo e(Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : ''); ?>">
                            <?php if($usr->can('role.view')): ?>
                                <li class="<?php echo e(Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.roles.index')); ?>">All Roles</a></li>
                            <?php endif; ?>
                            <?php if($usr->can('men.create')): ?>
                                <li class="<?php echo e(Route::is('admin.roles.create')  ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.roles.create')); ?>">Create Role</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete')): ?>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse <?php echo e(Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : ''); ?>">
                            <?php if($usr->can('admin.view')): ?>
                                <li class="<?php echo e(Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.admins.index')); ?>">All Admins</a></li>
                            <?php endif; ?>
                            <?php if($usr->can('admin.create')): ?>
                                <li class="<?php echo e(Route::is('admin.admins.create')  ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.admins.create')); ?>">Create Admin</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <!-- Agregar Registro Horario -->
                    <?php if($usr->can('registro-horario.view') || $usr->can('registro-horario.create')): ?>
                    <li>
                        <a href="<?php echo e(route('registro-horario.index')); ?>" aria-expanded="true"><i class="fa fa-calendar"></i><span>
                            Registro Horario
                        </span></a>
                    </li>
                    <?php endif; ?>

                    <!-- Agregar Registro Curso -->
                    <?php if($usr->can('registro-curso.view') || $usr->can('registro-curso.create')): ?>
                    <li>
                        <a href="<?php echo e(route('registro-curso.index')); ?>" aria-expanded="true"><i class="fa fa-book"></i><span>
                            Registro Curso
                        </span></a>
                    </li>
                    <?php endif; ?>

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
<?php /**PATH D:\codigos\sistema\person\resources\views/backend/layouts/partials/sidebar.blade.php ENDPATH**/ ?>