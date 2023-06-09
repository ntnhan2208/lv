<div class="topbar">
    <div class="topbar-left">
        <a href="#" class="logo">
            <span>
                Administrator
            </span>
        </a>
    </div>
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-nav float-right mb-0">
            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#"
                   role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <?php if(Auth::check()): ?>
                        <span class="ml-1 nav-user-name hidden-sm"> <?php echo e(Auth::User()->name); ?> <i
                                    class="mdi mdi-chevron-down"></i> </span>
                    <?php endif; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="<?php echo e(route('admins.edit',Auth::User()->id)); ?>"><i
                                class="dripicons-user text-muted mr-2"></i>
                        <?php echo e(trans('site.admin.profile')); ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('change_password')); ?>"><i
                                class="dripicons-gear text-muted mr-2"></i>
                        <?php echo e(trans('site.admin.change_pass')); ?></a>
                    <div class="dropdown-divider"></div>
                    <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class='btn btn-block dropdown-item'><i class="dripicons-exit text-muted
                         mr-2"></i> <?php echo e(trans('site.logout')); ?></button>
                    </form>
                </div>
            </li>
        </ul><!--end topbar-nav-->
        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <button class="button-menu-mobile nav-link waves-effect waves-light">
                    <i class="dripicons-menu nav-icon"></i>
                </button>
            </li>
        </ul>
    </nav>
</div>
 <?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/admin/layouts/topbar.blade.php ENDPATH**/ ?>