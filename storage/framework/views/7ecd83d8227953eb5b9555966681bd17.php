<?php $__env->startSection('title', 'Crear Horario - Panel de Administración'); ?>

<?php $__env->startSection('admin-content'); ?>
<!-- Page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Crear Horario</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li><a href="<?php echo e(route('admin.horarios.index')); ?>">Horarios</a></li>
                    <li><span>Crear Nuevo Horario</span></li>
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
                    <h4 class="header-title text-gray-700 mb-4">Crear Nuevo Horario</h4>

                    <form action="<?php echo e(route('admin.horarios.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="curso_id">Curso</label>
                            <select name="curso_id" id="curso_id" class="form-control <?php $__errorArgs = ['curso_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="">Seleccione un Curso</option>
                                <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($curso->id); ?>" <?php echo e(old('curso_id') == $curso->id ? 'selected' : ''); ?>><?php echo e($curso->nombre); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['curso_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="dia">Día</label>
                            <input type="text" name="dia" id="dia" class="form-control <?php $__errorArgs = ['dia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('dia')); ?>">
                            <?php $__errorArgs = ['dia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="hora_inicio">Hora de Inicio</label>
                            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control <?php $__errorArgs = ['hora_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('hora_inicio')); ?>">
                            <?php $__errorArgs = ['hora_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="hora_fin">Hora de Fin</label>
                            <input type="time" name="hora_fin" id="hora_fin" class="form-control <?php $__errorArgs = ['hora_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('hora_fin')); ?>">
                            <?php $__errorArgs = ['hora_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="hora_recreo">Hora de Recreo (opcional)</label>
                            <input type="time" name="hora_recreo" id="hora_recreo" class="form-control <?php $__errorArgs = ['hora_recreo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('hora_recreo')); ?>">
                            <?php $__errorArgs = ['hora_recreo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Crear Horario</button>
                        <a href="<?php echo e(route('admin.horarios.index')); ?>" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .form-control {
        border-radius: 8px;
        padding: 10px;
    }

    .btn {
        border-radius: 5px;
        font-size: 1rem;
    }

    .btn-primary {
        background-color: #3490dc;
        border-color: #3490dc;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .invalid-feedback {
        color: #e74c3c;
    }

    .card {
        border-radius: 10px;
        border: 1px solid #e2e8f0;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/horarios/create.blade.php ENDPATH**/ ?>