<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu">
        {{--        <li class="{{ (request()->is('admin/home*')) ? 'mm-active' : '' }}">--}}
        {{--            <a href="{{ route('dashboard') }}">--}}
        {{--                <i class="ti-dashboard"></i>--}}
        {{--                <span>{{ trans('site.dashboard') }}</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
{{--        <li class="{{ (request()->is('admin/admins*')) ? 'mm-active' : '' }}">--}}
{{--            <a href="{{ route('admins.index') }}">--}}
{{--                <i class="ti-lock"></i>--}}
{{--                <span>{{ trans('site.admin.title') }}</span>--}}
{{--            </a>--}}
{{--        </li>--}}
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
        <li class="{{ (request()->is('admin/booking*')) ? 'mm-active' : '' }}">
            <a href="{{ route('bookings.index') }}">
                <i class="ti-write"></i>
                <span>{{ trans('site.booking.title') }}</span>
            </a>
        </li>
    </ul>
</div>
