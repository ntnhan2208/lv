<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu">
        <li>
            <a href="javascript: void(0);"><i
                        class="ti-layout-column4-alt"></i><span>{{ trans('site.room.title') }}</span><span
                        class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('types.index') }}">
                        <i class="ti-control-record"></i>{{ trans('site.type.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rooms.index') }}">
                        <i class="ti-control-record"></i>{{ trans('site.room.title') }}
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('services.index') }}">
                <i class="ti-shortcode"></i>
                <span>{{ trans('site.service.title') }}</span>
            </a>
        </li>
        <li class="{{ (request()->is('admin/employees*')) ? 'mm-active' : '' }}">
            <a href="{{ route('employees.index') }}">
                <i class="ti-id-badge"></i>
                <span>{{ trans('site.employee.title') }}</span>
            </a>
        </li>
        <li class="{{ (request()->is('admin/customers*')) ? 'mm-active' : '' }}">
            <a href="{{ route('customers.index') }}">
                <i class="ti-user"></i>
                <span>{{ trans('site.customer.title') }}</span>
            </a>
        </li>
        <li class="{{ (request()->is('admin/appointment*')) ? 'mm-active' : '' }}">
            <a href="{{ route('appointments.index') }}">
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
                    <a class="nav-link" href="{{ route('bookings.index') }}">
                        <i class="ti-control-record"></i>Quản lý hợp đồng
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('deposits.index') }}">
                        <i class="ti-control-record"></i>Quản lý tiền cọc
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ (request()->is('admin/room-booked')) ? 'mm-active' : '' }}">
            <a href="{{ route('room-booked') }}">
                <i class="ti-check-box"></i>
                <span>Căn hộ đang cho thuê</span>
            </a>
        </li>
    </ul>
</div>
