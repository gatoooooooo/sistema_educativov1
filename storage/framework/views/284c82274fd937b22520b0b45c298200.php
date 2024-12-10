<?php $__env->startSection('title'); ?>
Cursos - Panel de Administración
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <!-- Estilos de DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-content'); ?>

<!-- Área de título de la página -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Cursos</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li><span>Todos los Cursos</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <?php echo $__env->make('backend.layouts.partials.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<!-- Fin del área de título -->

<div class="main-content-inner">
    <div class="row">
        <!-- Comienzo de la tabla de cursos -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Listado de Cursos</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="<?php echo e(route('admin.cursos.create')); ?>">Crear Nuevo Curso</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        <?php echo $__env->make('backend.layouts.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <table id="dataTable" class="text-center table table-striped table-bordered">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Sl</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($curso->nombre); ?></td>
                                    <td><?php echo e($curso->descripcion); ?></td>
                                    <td><?php echo e($curso->fecha_inicio); ?></td>
                                    <td><?php echo e($curso->fecha_fin); ?></td>
                                    <td>
                                        <a class="btn btn-success text-white" href="<?php echo e(route('admin.cursos.edit', $curso->id)); ?>">Editar</a>
                                        <a class="btn btn-danger text-white" href="<?php echo e(route('admin.cursos.destroy', $curso->id)); ?>"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-<?php echo e($curso->id); ?>').submit();">
                                            Eliminar
                                        </a>
                                        <!-- Enlace para Ver Horarios -->
                                        <a class="btn btn-info text-white" href="<?php echo e(route('admin.horarios.index', $curso->id)); ?>">Ver Horarios</a>

                                        <form id="delete-form-<?php echo e($curso->id); ?>" action="<?php echo e(route('admin.cursos.destroy', $curso->id)); ?>" method="POST" style="display: none;">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
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
        <!-- Fin de la tabla de cursos -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Scripts de DataTables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <script>
        /* ====================================
        Activar DataTables
        ==================================== */
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/cursos/index.blade.php ENDPATH**/ ?>