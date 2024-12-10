<?php $__env->startSection('title', 'Registrar Pago - Panel de Administración'); ?>

<?php $__env->startSection('admin-content'); ?>
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Pagos</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li><a href="<?php echo e(route('admin.pagos.index')); ?>">Pagos</a></li>
                        <li><span>Registrar</span></li>
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
                        <h4 class="header-title">Registrar Pago</h4>
                        <?php echo $__env->make('backend.layouts.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form action="<?php echo e(route('admin.pagos.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div class="form-group">
        <label for="registro_estudiante_id">Estudiante</label>
        <select name="registro_estudiante_id" id="registro_estudiante_id" class="form-control" required>
            <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($estudiante->id); ?>"><?php echo e($estudiante->nombre); ?> <?php echo e($estudiante->apellido); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="form-group">
        <label for="monto">Monto</label>
        <input type="number" name="monto" id="monto" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="fecha_pago">Fecha de Pago</label>
        <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="estado">Estado</label>
        <select name="estado" id="estado" class="form-control" required>
            <option value="Pagado">Pagado</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Vencido">Vencido</option>
        </select>
    </div>

    <div class="form-group">
        <label for="metodo_pago">Método de Pago</label>
        <select name="metodo_pago" id="metodo_pago" class="form-control" required>
            <option value="Efectivo">Efectivo</option>
            <option value="Transferencia">Transferencia</option>
            <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
        </select>
    </div>

    <div class="form-group">
        <label for="referencia">Referencia</label>
        <input type="text" name="referencia" id="referencia" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary mt-3">Guardar Pago</button>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/pagos/create.blade.php ENDPATH**/ ?>