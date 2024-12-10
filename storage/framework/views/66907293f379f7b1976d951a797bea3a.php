<div class="user-profile pull-right">
    <img class="avatar user-thumb" src="<?php echo e(asset('backend/assets/images/img/avatar.jpeg')); ?>" alt="avatar" style="border-radius: 50%; width: 40px; height: 40px; margin-right: 10px;">
    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
        <?php echo e(Auth::guard('admin')->user()->name); ?>

        <i class="fa fa-angle-down"></i>
    </h4>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo e(route('admin.logout.submit')); ?>"
        onclick="event.preventDefault();
                    document.getElementById('admin-logout-form').submit();">Log Out</a>
    </div>

    <form id="admin-logout-form" action="<?php echo e(route('admin.logout.submit')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
</div><?php /**PATH D:\codigos\sistema\person\resources\views/backend/layouts/partials/logout.blade.php ENDPATH**/ ?>