<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ auth()->guard('admin')->user()->image_path }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->guard('admin')->user()->name }}</p>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">

            @if (auth()->guard('admin')->user()->hasPermission('dashboard_admin_read'))
                <li class="{{ request()->segment(3) == '' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admin.welcome') }}"><i class="fa fa-dashboard"></i><span>@lang('dashboard.dashboard')</span></a>
                </li>
            @endif

            @if (auth()->guard('admin')->user()->hasPermission('admins_read'))
                <li class="{{ request()->segment(3) == 'admins' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admin.admins.index') }}"><i class="fa fa-dashboard"></i><span>@lang('admin.admins')</span></a>
                </li>
            @endif

            @if (auth()->guard('admin')->user()->hasPermission('apartments_read'))
                <li class="{{ request()->segment(3) == '' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admin.apartments.index') }}"><i class="fa fa-dashboard"></i><span>@lang('dashboard.apartments')</span></a>
                </li>
            @endif

            @if (auth()->guard('admin')->user()->hasPermission('orders_read'))
                <li class="{{ request()->segment(3) == 'orders' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admin.orders.index') }}"><i class="fa fa-dashboard"></i><span>@lang('admin.orders')</span></a>
                </li>
            @endif

            @if (auth()->guard('admin')->user()->hasPermission('citys_read'))
                <li class="{{ request()->segment(3) == '' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admin.citys.index') }}"><i class="fa fa-dashboard"></i><span>@lang('dashboard.citys')</span></a>
                </li>
            @endif

        </ul>

    </section>

</aside>

