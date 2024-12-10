<form action="<?php echo e(route('admin.notas.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>  <!-- Token CSRF -->
    
    <div class="form-group">
        <label for="registro_estudiante_id">Estudiante:</label>
        <select name="registro_estudiante_id" class="form-control" required>
            <option value="">Selecciona un estudiante</option>
            <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($estudiante->id); ?>"><?php echo e($estudiante->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="form-group">
        <label for="curso_id">Curso:</label>
        <select name="curso_id" class="form-control" required>
            <option value="">Selecciona un curso</option>
            <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($curso->id); ?>"><?php echo e($curso->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Asignar</button>
</form>
<?php /**PATH D:\codigos\sistema\person\resources\views/notas/create.blade.php ENDPATH**/ ?>