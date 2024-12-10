<?php $__env->startSection('title', 'Lista de Asistencias de Estudiantes'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-content'); ?>
    <div class="container">
        <h1>Listado de Asistencias de Estudiantes</h1>
        <a href="<?php echo e(route('admin.asistencias.create')); ?>" class="btn btn-primary mb-3">Registrar Asistencia</a>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

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
            <?php $__empty_1 = true; $__currentLoopData = $asistencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asistencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($asistencia->id); ?></td>
                    <td><?php echo e($asistencia->estudiante->nombre_completo); ?></td>
                    <td><?php echo e($asistencia->curso->nombre); ?></td>
                    <td><?php echo e($asistencia->fecha); ?></td>
                    <td><?php echo e($asistencia->hora); ?></td>
                    <td>
                        <!-- Mostrar el estado de la asistencia -->
                        <?php if($asistencia->estado == 'presente'): ?>
                            <span class="badge badge-success">Presente</span>
                        <?php elseif($asistencia->estado == 'ausente'): ?>
                            <span class="badge badge-danger">Ausente</span>
                        <?php elseif($asistencia->estado == 'justificado'): ?>
                            <span class="badge badge-warning">Justificado</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.asistencias.edit', $asistencia->id)); ?>" class="btn btn-sm btn-warning">Editar</a>
                        <form action="<?php echo e(route('admin.asistencias.destroy', $asistencia->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta asistencia?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="text-center">No hay asistencias registradas.</td>  <!-- Actualizado a 7 columnas -->
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
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

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/asistencias/index.blade.php ENDPATH**/ ?>