<?php $__env->startSection('title', 'Crear Curso - Panel de Administración'); ?>

<?php $__env->startSection('admin-content'); ?>
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Cursos</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li><a href="<?php echo e(route('admin.cursos.index')); ?>">Cursos</a></li>
                        <li><span>Crear</span></li>
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
                        <h4 class="header-title">Crear Nuevo Curso</h4>
                        <?php echo $__env->make('backend.layouts.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form action="<?php echo e(route('admin.cursos.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="nombre">Nombre del Curso</label>
                                <input type="text" name="nombre" id="nombre" value="<?php echo e(old('nombre')); ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4" class="form-control" required><?php echo e(old('descripcion')); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de Inicio</label>
                                <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo e(old('fecha_inicio')); ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha_fin">Fecha de Fin</label>
                                <input type="date" name="fecha_fin" id="fecha_fin" value="<?php echo e(old('fecha_fin')); ?>" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Crear Curso</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/cursos/create.blade.php ENDPATH**/ ?>