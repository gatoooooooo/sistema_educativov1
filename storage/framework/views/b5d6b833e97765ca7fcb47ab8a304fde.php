<?php $__env->startSection('title'); ?>
Dashboard Page - Admin Panel
<?php $__env->stopSection(); ?>


<?php $__env->startSection('admin-content'); ?>

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <?php echo $__env->make('backend.layouts.partials.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-8">
        <div class="row">
        <div class="col-md-6 mt-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <a href="<?php echo e(route('admin.estudiantes.index')); ?>">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-users"></i>Estudiantes</div>
                                <h2><?php echo e($total_estudiante); ?></h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <a href="<?php echo e(route('admin.docentes.index')); ?>">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-users"></i>docentes</div>
                                <h2><?php echo e($total_docente); ?></h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <div class="col-md-6 mt-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <a href="<?php echo e(route('admin.cursos.index')); ?>">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-book"></i>cursos</div>
                                <h2><?php echo e($total_curso); ?></h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <a href="<?php echo e(route('admin.horarios.index')); ?>">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-calendar"></i>horarios</div>
                                <h2><?php echo e($total_horario); ?></h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <a href="<?php echo e(route('admin.notas.index')); ?>">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-sticky-note"></i>notas</div>
                                <h2><?php echo e($total_nota); ?></h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <a href="<?php echo e(route('admin.roles.index')); ?>">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-users"></i> Roles</div>
                                <h2><?php echo e($total_roles); ?></h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-md-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <a href="<?php echo e(route('admin.admins.index')); ?>">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-user"></i> Admins</div>
                                <h2><?php echo e($total_admins); ?></h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3 mb-lg-0">
                <div class="card">
                    <div class="seo-fact sbg3">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="fa fa-check-circle-o"></i>Permissions</div>
                            <h2><?php echo e($total_permissions); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\codigos\sistema\person\resources\views/backend/pages/dashboard/index.blade.php ENDPATH**/ ?>