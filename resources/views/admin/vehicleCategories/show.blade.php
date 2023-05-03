@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vehicleCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $vehicleCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $vehicleCategory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleCategory.fields.base') }}
                        </th>
                        <td>
                            {{ $vehicleCategory->base }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-categories.index') }}">
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
            <a class="nav-link" href="#vehicle_category_zone_vehicle_categories" role="tab" data-toggle="tab">
                {{ trans('cruds.zoneVehicleCategory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="vehicle_category_zone_vehicle_categories">
            @includeIf('admin.vehicleCategories.relationships.vehicleCategoryZoneVehicleCategories', ['zoneVehicleCategories' => $vehicleCategory->vehicleCategoryZoneVehicleCategories])
        </div>
    </div>
</div>

@endsection