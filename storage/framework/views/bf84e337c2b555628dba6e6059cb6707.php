<?php $__env->startSection('title', 'Lista de Estudiantes'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-content'); ?>
    <!-- Título y Breadcrumb -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Estudiantes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li><span>Lista de Estudiantes</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <?php echo $__env->make('backend.layouts.partials.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Lista de Estudiantes</h4>
                        <a class="btn btn-primary text-white float-right mb-2" href="<?php echo e(route('admin.estudiantes.create')); ?>">Crear Nuevo Estudiante</a>
                        <div class="clearfix"></div>

                        <!-- Mensajes de éxito/error -->
                        <?php echo $__env->make('backend.layouts.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <!-- Tabla de estudiantes -->
                        <div class="data-tables">
                            <table id="dataTable" class="table text-center">
                                <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Completo</th>
                                    <th>Grado</th>
                                    <th>Sección</th>
                                    <th>Fecha de Ingreso</th>
                                    <!--<th>Promedio</th>-->>
                                    <th>Nombre del Padre</th>
                                    <th>Nombre de la Madre</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($estudiante->nombre_completo); ?></td>
                                        <td><?php echo e($estudiante->grado); ?></td>
                                        <td><?php echo e($estudiante->seccion); ?></td>
                                        <td><?php echo e($estudiante->fecha_ingreso); ?></td>
                                       <!--<td><?php echo e($estudiante->promedio); ?></td>-->
                                        <td><?php echo e($estudiante->nombre_padre); ?></td>
                                        <td><?php echo e($estudiante->nombre_madre); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.estudiantes.edit', $estudiante->id)); ?>" class="btn btn-success btn-sm">Editar</a>
                                            <a href="#" class="btn btn-danger btn-sm"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-<?php echo e($estudiante->id); ?>').submit();">
                                                Eliminar
                                            </a>
                                            <form id="delete-form-<?php echo e($estudiante->id); ?>" action="<?php echo e(route('admin.estudiantes.destroy', $estudiante->id)); ?>" method="POST" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/estudiantes/index.blade.php ENDPATH**/ ?>