<?php $__env->startSection('title', 'Horarios - Panel de Administración'); ?>

<?php $__env->startSection('admin-content'); ?>

<!-- Page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Horarios de Clases</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li><span>Horarios</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <?php echo $__env->make('backend.layouts.partials.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<!-- Page title area end -->

<div class="main-content-inner">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title text-gray-700">Lista de Horarios</h4>
                        <a href="<?php echo e(route('admin.horarios.create')); ?>" class="btn btn-primary text-white">Crear Nuevo Horario</a>
                    </div>

                    <?php echo $__env->make('backend.layouts.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="table-responsive mt-4">
                        <table class="table table-striped table-bordered text-center">
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="15%">Curso</th>
                                    <th width="15%">Día</th>
                                    <th width="15%">Hora de Inicio</th>
                                    <th width="15%">Hora de Fin</th>
                                    <th width="10%">Hora de Recreo</th>
                                    <th width="20%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($horario->id); ?></td>
                                    <td><?php echo e($horario->curso->nombre); ?></td>
                                    <td><?php echo e($horario->dia); ?></td>
                                    <td><?php echo e($horario->hora_inicio); ?></td>
                                    <td><?php echo e($horario->hora_fin); ?></td>
                                    <td><?php echo e($horario->hora_recreo ?? 'No asignada'); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.horarios.edit', $horario->id)); ?>" class="btn btn-warning text-white btn-sm">
                                            <i class="fa-solid fa-edit"></i> Editar
                                        </a>

                                        <form action="<?php echo e(route('admin.horarios.destroy', $horario->id)); ?>" method="POST" class="d-inline-block">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger text-white btn-sm" onclick="return confirm('¿Estás seguro de eliminar este horario?')">
                                                <i class="fa-solid fa-trash"></i> Eliminar
                                            </button>
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

<?php $__env->startSection('styles'); ?>
<style>
    .page-title-area {
        background-color: #f3f4f6;
        padding: 20px;
        border-radius: 8px;
    }

    .header-title {
        font-size: 1.5rem;
        font-weight: 600;
    }

    .card {
        border-radius: 10px;
        border: 1px solid #e2e8f0;
    }

    .table {
        font-size: 1rem;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 10px 15px;
        border: 1px solid #e2e8f0;
        text-align: center;
    }

    .table th {
        background-color: #4f83cc;
        color: white;
    }

    .table tbody tr:hover {
        background-color: #f1f5f8;
    }

    .btn {
        font-size: 0.9rem;
        padding: 8px 12px;
        border-radius: 5px;
    }

    .btn-warning {
        background-color: #ffb822;
        border-color: #ffb822;
    }

    .btn-danger {
        background-color: #e74c3c;
        border-color: #e74c3c;
    }

    .btn-primary {
        background-color: #3490dc;
        border-color: #3490dc;
    }

    .btn-primary:hover,
    .btn-warning:hover,
    .btn-danger:hover {
        opacity: 0.9;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('table').DataTable({
            responsive: true
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/horarios/index.blade.php ENDPATH**/ ?>