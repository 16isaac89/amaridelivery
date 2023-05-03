@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.zoneVehicleCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zone-vehicle-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.zoneVehicleCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $zoneVehicleCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zoneVehicleCategory.fields.zone') }}
                        </th>
                        <td>
                            {{ $zoneVehicleCategory->zone->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zoneVehicleCategory.fields.vehicle_category') }}
                        </th>
                        <td>
                            {{ $zoneVehicleCategory->vehicle_category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zoneVehicleCategory.fields.price') }}
                        </th>
                        <td>
                            {{ $zoneVehicleCategory->price }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zone-vehicle-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection