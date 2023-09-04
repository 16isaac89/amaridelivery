<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }} {{ request()->is("admin/customers*") ? "menu-open" : "" }} {{ request()->is("admin/addres*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/audit-logs*") ? "active" : "" }} {{ request()->is("admin/customers*") ? "active" : "" }} {{ request()->is("admin/addres*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('customer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.customers.index") }}" class="nav-link {{ request()->is("admin/customers") || request()->is("admin/customers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.customer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('addre_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.addres.index") }}" class="nav-link {{ request()->is("admin/addres") || request()->is("admin/addres/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marked-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addre.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('vehicle_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/vehicle-categories*") ? "menu-open" : "" }} {{ request()->is("admin/fleets*") ? "menu-open" : "" }} {{ request()->is("admin/drivers*") ? "menu-open" : "" }} {{ request()->is("admin/zones*") ? "menu-open" : "" }} {{ request()->is("admin/zone-vehicle-categories*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/vehicle-categories*") ? "active" : "" }} {{ request()->is("admin/fleets*") ? "active" : "" }} {{ request()->is("admin/drivers*") ? "active" : "" }} {{ request()->is("admin/zones*") ? "active" : "" }} {{ request()->is("admin/zone-vehicle-categories*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-truck-moving">

                            </i>
                            <p>
                                {{ trans('cruds.vehicle.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('vehicle_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.vehicle-categories.index") }}" class="nav-link {{ request()->is("admin/vehicle-categories") || request()->is("admin/vehicle-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shuttle-van">

                                        </i>
                                        <p>
                                            {{ trans('cruds.vehicleCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('fleet_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.fleets.index") }}" class="nav-link {{ request()->is("admin/fleets") || request()->is("admin/fleets/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-car">

                                        </i>
                                        <p>
                                            {{ trans('cruds.fleet.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('driver_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.drivers.index") }}" class="nav-link {{ request()->is("admin/drivers") || request()->is("admin/drivers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-child">

                                        </i>
                                        <p>
                                            {{ trans('cruds.driver.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('zone_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.zones.index") }}" class="nav-link {{ request()->is("admin/zones") || request()->is("admin/zones/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-road">

                                        </i>
                                        <p>
                                            {{ trans('cruds.zone.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('zone_vehicle_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.zone-vehicle-categories.index") }}" class="nav-link {{ request()->is("admin/zone-vehicle-categories") || request()->is("admin/zone-vehicle-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-accusoft">

                                        </i>
                                        <p>
                                            {{ trans('cruds.zoneVehicleCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('system_setting_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.system-settings.index") }}" class="nav-link {{ request()->is("admin/system-settings") || request()->is("admin/system-settings/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.systemSetting.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('order_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/orders*") ? "menu-open" : "" }} {{ request()->is("admin/partners*") ? "menu-open" : "" }} {{ request()->is("admin/partner-users*") ? "menu-open" : "" }} {{ request()->is("admin/routes*") ? "menu-open" : "" }} {{ request()->is("admin/places*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/orders*") ? "active" : "" }} {{ request()->is("admin/partners*") ? "active" : "" }} {{ request()->is("admin/partner-users*") ? "active" : "" }} {{ request()->is("admin/routes*") ? "active" : "" }} {{ request()->is("admin/places*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-ambulance">

                            </i>
                            <p>
                                {{ trans('cruds.orderManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('order_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.orders.index") }}" class="nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.order.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('order_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.orders.new") }}" class="nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            New
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('partner_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partners.index") }}" class="nav-link {{ request()->is("admin/partners") || request()->is("admin/partners/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-battery-full">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partner.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('partner_user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partner-users.index") }}" class="nav-link {{ request()->is("admin/partner-users") || request()->is("admin/partner-users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-church">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partnerUser.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('route_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.routes.index") }}" class="nav-link {{ request()->is("admin/routes") || request()->is("admin/routes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-road">

                                        </i>
                                        <p>
                                            {{ trans('cruds.route.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('place_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.places.index") }}" class="nav-link {{ request()->is("admin/places") || request()->is("admin/places/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-compass">

                                        </i>
                                        <p>
                                            {{ trans('cruds.place.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>