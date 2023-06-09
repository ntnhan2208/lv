<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu">
        <li class="<?php echo e((request()->is('admin/home*')) ? 'mm-active' : ''); ?>">
            <a href="<?php echo e(route('dashboard')); ?>">
                <i class="ti-dashboard"></i>
                <span><?php echo e(trans('site.dashboard')); ?></span>
            </a>
        </li>
    <?php if(\Illuminate\Support\Facades\Auth::user()->role==0): ?>
            <li class="<?php echo e((request()->is('admin/admins*')) ? 'mm-active' : ''); ?>">
                <a href="<?php echo e(route('admins.index')); ?>">
                    <i class="ti-lock"></i>
                    <span><?php echo e(trans('site.admin.title')); ?></span>
                </a>
            </li>
            <li class="<?php echo e((request()->is('admin/employees*')) ? 'mm-active' : ''); ?>">
                <a href="<?php echo e(route('employees.index')); ?>">
                    <i class="ti-id-badge"></i>
                    <span><?php echo e(trans('site.employee.title')); ?></span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);"><i
                            class="ti-layout-column4-alt"></i><span><?php echo e(trans('site.room.title')); ?></span><span
                            class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('rooms.index')); ?>">
                            <i class="ti-control-record"></i><?php echo e(trans('site.room.title')); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('types.index')); ?>">
                            <i class="ti-control-record"></i><?php echo e(trans('site.type.title')); ?>

                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo e(route('services.index')); ?>">
                    <i class="ti-shortcode"></i>
                    <span><?php echo e(trans('site.service.title')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <li class="<?php echo e((request()->is('admin/customers*')) ? 'mm-active' : ''); ?>">
            <a href="<?php echo e(route('customers.index')); ?>">
                <i class="ti-user"></i>
                <span><?php echo e(trans('site.customer.title')); ?></span>
            </a>
        </li>
        <li class="<?php echo e((request()->is('admin/booking*')) ? 'mm-active' : ''); ?>">
            <a href="<?php echo e(route('bookings.index')); ?>">
                <i class="ti-write"></i>
                <span><?php echo e(trans('site.booking.title')); ?></span>
            </a>
        </li>
        <li class="<?php echo e((request()->is('admin/booking*')) ? 'mm-active' : ''); ?>">
            <a href="<?php echo e(route('request_bookings.index')); ?>">
                <i class="ti-bookmark-alt"></i>
                <span><?php echo e(trans('site.request_booking.title')); ?></span>
            </a>
        </li>
    </ul>
</div>
<?php /**PATH C:\Users\ntnng\Desktop\nhanhao\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>