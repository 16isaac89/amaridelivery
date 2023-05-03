@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.driver.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.drivers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.id') }}
                        </th>
                        <td>
                            {{ $driver->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.fullname') }}
                        </th>
                        <td>
                            {{ $driver->fullname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.email') }}
                        </th>
                        <td>
                            {{ $driver->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.phone_1') }}
                        </th>
                        <td>
                            {{ $driver->phone_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.photo') }}
                        </th>
                        <td>
                            @if($driver->photo)
                                <a href="{{ $driver->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.idphoto') }}
                        </th>
                        <td>
                            @if($driver->idphoto)
                                <a href="{{ $driver->idphoto->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->idphoto->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.password') }}
                        </th>
                        <td>
                            {{ $driver->password }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.phone_2') }}
                        </th>
                        <td>
                            {{ $driver->phone_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.routes') }}
                        </th>
                        <td>
                            @foreach($driver->routes as $key => $routes)
                                <span class="label label-info">{{ $routes->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.drivers.index') }}">
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
            <a class="nav-link" href="#driver_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.order.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="driver_orders">
            @includeIf('admin.drivers.relationships.driverOrders', ['orders' => $driver->driverOrders])
        </div>
    </div>
</div>

@endsection