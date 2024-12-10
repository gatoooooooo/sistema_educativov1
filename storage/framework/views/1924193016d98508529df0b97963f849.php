<?php $__env->startSection('title', 'Registrar Asistencia de Estudiante'); ?>

<?php $__env->startSection('admin-content'); ?>
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Asistencias de Estudiantes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li><a href="<?php echo e(route('admin.asistencias.index')); ?>">Listado de Asistencias</a></li>
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
                        <h4 class="header-title">Registrar Nueva Asistencia de Estudiante</h4>
                        <a href="<?php echo e(route('admin.asistencias.index')); ?>" class="btn btn-secondary mb-3">Volver al Listado</a>
                        <?php echo $__env->make('backend.layouts.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form action="<?php echo e(route('admin.asistencias.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="estudiante_id">Estudiante</label>
                                <select name="estudiante_id" id="estudiante_id" class="form-control" required>
                                    <option value="">Seleccione un estudiante</option>
                                    <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($estudiante->id); ?>"><?php echo e($estudiante->nombre_completo); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="curso_id">Curso</label>
                                <select name="curso_id" id="curso_id" class="form-control" required>
                                    <option value="">Seleccione un curso</option>
                                    <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($curso->id); ?>"><?php echo e($curso->nombre); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo e(old('fecha')); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="hora">Hora</label>
                                <input type="time" name="hora" id="hora" class="form-control" value="<?php echo e(old('hora')); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control" required>
                                    <option value="">Seleccione el estado</option>
                                    <option value="presente" <?php echo e(old('estado') == 'presente' ? 'selected' : ''); ?>>Presente</option>
                                    <option value="ausente" <?php echo e(old('estado') == 'ausente' ? 'selected' : ''); ?>>Ausente</option>
                                    <option value="justificado" <?php echo e(old('estado') == 'justificado' ? 'selected' : ''); ?>>Justificado</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Registrar Asistencia</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/asistencias/create.blade.php ENDPATH**/ ?>