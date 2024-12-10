

<?php $__env->startSection('title', 'Fechas de Pago'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-content'); ?>
<div class="container">
    <h1>Fechas de Pago</h1>
    <a href="<?php echo e(route('admin.fecha_pagos.create')); ?>" class="btn btn-success mb-3">Registrar Fecha de Pago</a>

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
            <?php $__currentLoopData = $fechas_pagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($pago->id); ?></td>
                    <td><?php echo e($pago->fecha_pago); ?></td>
                    <td><?php echo e($pago->tipo_matricula); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.fecha_pagos.edit', $pago->id)); ?>" class="btn btn-warning">Editar</a>
                        <form action="<?php echo e(route('admin.fecha_pagos.destroy', $pago->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta fecha de pago?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/fecha_pagos/index.blade.php ENDPATH**/ ?>