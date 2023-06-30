<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu">
        <li>
            <a href="javascript: void(0);"><i
                        class="ti-layout-column4-alt"></i><span><?php echo e(trans('site.room.title')); ?></span><span
                        class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('types.index')); ?>">
                        <i class="ti-control-record"></i><?php echo e(trans('site.type.title')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('rooms.index')); ?>">
                        <i class="ti-control-record"></i><?php echo e(trans('site.room.title')); ?>

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
        <li class="<?php echo e((request()->is('admin/employees*')) ? 'mm-active' : ''); ?>">
            <a href="<?php echo e(route('employees.index')); ?>">
                <i class="ti-id-badge"></i>
                <span><?php echo e(trans('site.employee.title')); ?></span>
            </a>
        </li>
        <li class="<?php echo e((request()->is('admin/customers*')) ? 'mm-active' : ''); ?>">
            <a href="<?php echo e(route('customers.index')); ?>">
                <i class="ti-user"></i>
                <span><?php echo e(trans('site.customer.title')); ?></span>
            </a>
        </li>
        <li class="<?php echo e((request()->is('admin/appointment*')) ? 'mm-active' : ''); ?>">
            <a href="<?php echo e(route('appointments.index')); ?>">
                <i class="ti-calendar"></i>
                <span>Quản lý lịch hẹn</span>
            </a>
        </li>
        <li>
            <a href="javascript: void(0);"><i
                        class="ti-bookmark-alt"></i><span>Quản lý hợp đồng - cọc</span><span
                        class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('bookings.index')); ?>">
                        <i class="ti-control-record"></i>Quản lý hợp đồng
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('deposits.index')); ?>">
                        <i class="ti-control-record"></i>Quản lý tiền cọc
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php echo e((request()->is('admin/room-booked')) ? 'mm-active' : ''); ?>">
            <a href="<?php echo e(route('room-booked')); ?>">
                <i class="ti-check-box"></i>
                <span>Căn hộ đang cho thuê</span>
            </a>
        </li>
    </ul>
</div>
<?php /**PATH D:\DEV\luanvan\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>