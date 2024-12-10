<?php $__env->startSection('title'); ?>
    Create Admin - Admin Panel
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .form-check-label {
            text-transform: capitalize;
        }

        .superuser-text {
            display: none;
            color: red;
            font-weight: bold;
        }

        .disabled-option {
            color: #ccc;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-content'); ?>
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Create Admin</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li><a href="<?php echo e(route('admin.admins.index')); ?>">All Admins</a></li>
                    <li><span>Create Admin</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <?php echo $__env->make('backend.layouts.partials.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<div class="main-content-inner" x-data="roleSelection()">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create Admin</h4>
                    <?php echo $__env->make('backend.layouts.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form action="<?php echo e(route('admin.admins.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Admin Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">Admin Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="roles">Assign Roles</label>
                                <select name="roles[]" id="roles" class="form-control select2" multiple x-model="selectedRoles" @change="handleRoleChange">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"
                                            :disabled="isSuperuserSelected && <?php echo e($role->id); ?> != 1 || !canEnableRole(<?php echo e($role->id); ?>)"
                                            x-bind:class="{ 'disabled-option': isSuperuserSelected && <?php echo e($role->id); ?> != 1 }">
                                            <?php echo e($role->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="username">Admin Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo e(old('username')); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <p x-show="isSuperuserSelected" class="superuser-text">This user is a Superuser.</p>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save</button>
                        <a href="<?php echo e(route('admin.admins.index')); ?>" class="btn btn-secondary mt-4 pr-4 pl-4">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('roleSelection', () => ({
                selectedRoles: <?php echo json_encode(old('roles', []), 512) ?>,

                get isSuperuserSelected() {
                    return this.selectedRoles.includes('1');
                },

                init() {
                    // Inicializar Select2
                    $('.select2').select2();

                    // Monitorear cambios en el select
                    $('#roles').on('change', () => {
                        this.selectedRoles = $('#roles').val();
                        this.handleRoleChange();
                    });

                    this.handleRoleChange();
                },

                handleRoleChange() {
                    const selectElement = $('#roles');

                    // Deshabilitar o habilitar opciones según la selección de Superuser
                    selectElement.find('option').each((_, option) => {
                        const value = $(option).val();
                        if (this.isSuperuserSelected && value !== '1') {
                            $(option).prop('disabled', true);
                        } else {
                            $(option).prop('disabled', false);
                        }
                    });

                    // Deshabilitar Superuser si hay otros roles seleccionados
                    const hasOtherRoles = this.selectedRoles.length > 0 && !this.isSuperuserSelected;
                    selectElement.find('option[value="1"]').prop('disabled', hasOtherRoles);

                    // Actualizar visualmente el estado deshabilitado de las opciones
                    selectElement.trigger('change.select2');
                },

                canEnableRole(roleId) {
                    return !this.isSuperuserSelected || roleId === 1;
                }
            }));
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/backend/pages/admins/create.blade.php ENDPATH**/ ?>