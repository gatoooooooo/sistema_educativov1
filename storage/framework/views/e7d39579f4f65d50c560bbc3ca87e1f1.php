<?php $__env->startSection('title', 'Lista de Estudiantes'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-content'); ?>
<div class="container">
    <h1>Pagos</h1>
    <a href="<?php echo e(route('admin.pagos.create')); ?>" class="btn btn-primary">Registrar Pago</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Monto</th>
                <th>Fecha de Pago</th>
                <th>Estado</th>
                <th>Método de Pago</th>
                <th>Referencia</th>
                <th>Fecha de Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($pago->estudiante->nombre); ?> <?php echo e($pago->estudiante->apellido); ?></td>
                    <td><?php echo e($pago->monto); ?></td>
                    <td><?php echo e($pago->fecha_pago); ?></td>
                    <td><?php echo e($pago->estado); ?></td>
                    <td><?php echo e($pago->metodo_pago); ?></td>
                    <td><?php echo e($pago->referencia); ?></td>
                    <td><?php echo e($pago->fecha_registro); ?></td>
                    <td>
                        <form action="<?php echo e(route('admin.pagos.destroy', $pago->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
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
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/pagos/index.blade.php ENDPATH**/ ?>