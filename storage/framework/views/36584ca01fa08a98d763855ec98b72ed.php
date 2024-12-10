

<?php $__env->startSection('title', 'Editar Fecha de Pago'); ?>

<?php $__env->startSection('admin-content'); ?>
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Fecha de Pago</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li><a href="<?php echo e(route('admin.fecha_pagos.index')); ?>">Fechas de Pago</a></li>
                        <li><span>Editar</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <?php echo $__env->make('backend.layouts.partials.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Editar Fecha de Pago</h4>
                        <?php echo $__env->make('backend.layouts.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form action="<?php echo e(route('admin.fecha_pagos.update', $pago->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-group">
                                <label for="fecha_pago">Fecha de Pago</label>
                                <input type="date" name="fecha_pago" class="form-control" value="<?php echo e($pago->fecha_pago); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="tipo_matricula">Tipo de Matrícula</label>
                                <select name="tipo_matricula" class="form-control" required>
                                    <option value="Primera" <?php echo e($pago->tipo_matricula == 'Primera' ? 'selected' : ''); ?>>Primera</option>
                                    <option value="Segunda" <?php echo e($pago->tipo_matricula == 'Segunda' ? 'selected' : ''); ?>>Segunda</option>
                                    <option value="Tercera" <?php echo e($pago->tipo_matricula == 'Tercera' ? 'selected' : ''); ?>>Tercera</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/fecha_pagos/edit.blade.php ENDPATH**/ ?>