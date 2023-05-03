@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.route.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.routes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.route.fields.id') }}
                        </th>
                        <td>
                            {{ $route->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.route.fields.name') }}
                        </th>
                        <td>
                            {{ $route->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.route.fields.location') }}
                        </th>
                        <td>
                            {{ $route->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.route.fields.places') }}
                        </th>
                        <td>
                            @foreach($route->places as $key => $places)
                                <span class="label label-info">{{ $places->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.routes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#route_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.order.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#routes_drivers" role="tab" data-toggle="tab">
                {{ trans('cruds.driver.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="route_orders">
            @includeIf('admin.routes.relationships.routeOrders', ['orders' => $route->routeOrders])
        </div>
        <div class="tab-pane" role="tabpanel" id="routes_drivers">
            @includeIf('admin.routes.relationships.routesDrivers', ['drivers' => $route->routesDrivers])
        </div>
    </div>
</div>

@endsection