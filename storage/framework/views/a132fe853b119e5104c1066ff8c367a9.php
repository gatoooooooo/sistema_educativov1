<?php $__env->startSection('title', 'Lista de Notas'); ?>

<?php $__env->startSection('admin-content'); ?>
<div class="container">
    <h1>Notas</h1>
    <!-- Botón para agregar estudiante y curso -->
    <a href="<?php echo e(route('admin.notas.create')); ?>" class="btn btn-primary mb-3">Agregar estudiante y curso</a>

    <!-- Tabla de notas -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Fecha</th>
                <th>Comentarios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $notas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($nota->estudiante->nombre); ?> <?php echo e($nota->estudiante->apellido); ?></td>
                <td><?php echo e($nota->curso->nombre); ?></td>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <td>
                        <select name="nota1" class="form-control">
                            <option value="AD" <?php echo e($nota->nota1 == 'AD' ? 'selected' : ''); ?>>AD</option>
                            <option value="A" <?php echo e($nota->nota1 == 'A' ? 'selected' : ''); ?>>A</option>
                            <option value="B" <?php echo e($nota->nota1 == 'B' ? 'selected' : ''); ?>>B</option>
                            <option value="C" <?php echo e($nota->nota1 == 'C' ? 'selected' : ''); ?>>C</option>
                        </select>
                    </td>
                    <td>
                        <select name="nota2" class="form-control">
                            <option value="AD" <?php echo e($nota->nota2 == 'AD' ? 'selected' : ''); ?>>AD</option>
                            <option value="A" <?php echo e($nota->nota2 == 'A' ? 'selected' : ''); ?>>A</option>
                            <option value="B" <?php echo e($nota->nota2 == 'B' ? 'selected' : ''); ?>>B</option>
                            <option value="C" <?php echo e($nota->nota2 == 'C' ? 'selected' : ''); ?>>C</option>
                        </select>
                    </td>
                    <td>
                        <select name="nota3" class="form-control">
                            <option value="AD" <?php echo e($nota->nota3 == 'AD' ? 'selected' : ''); ?>>AD</option>
                            <option value="A" <?php echo e($nota->nota3 == 'A' ? 'selected' : ''); ?>>A</option>
                            <option value="B" <?php echo e($nota->nota3 == 'B' ? 'selected' : ''); ?>>B</option>
                            <option value="C" <?php echo e($nota->nota3 == 'C' ? 'selected' : ''); ?>>C</option>
                        </select>
                    </td>
                    <td><?php echo e($nota->fecha); ?></td>
                    <td>
                        <input type="text" name="comentarios" value="<?php echo e($nota->comentarios); ?>" class="form-control">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    </td>
                </form>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/notas/index.blade.php ENDPATH**/ ?>