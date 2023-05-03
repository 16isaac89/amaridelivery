@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.zone.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.id') }}
                        </th>
                        <td>
                            {{ $zone->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.name') }}
                        </th>
                        <td>
                            {{ $zone->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.from') }}
                        </th>
                        <td>
                            {{ $zone->from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.to') }}
                        </th>
                        <td>
                            {{ $zone->to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.distance') }}
                        </th>
                        <td>
                            {{ $zone->distance }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zones.index') }}">
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
            <a class="nav-link" href="#zone_zone_vehicle_categories" role="tab" data-toggle="tab">
                {{ trans('cruds.zoneVehicleCategory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="zone_zone_vehicle_categories">
            @includeIf('admin.zones.relationships.zoneZoneVehicleCategories', ['zoneVehicleCategories' => $zone->zoneZoneVehicleCategories])
        </div>
    </div>
</div>

@endsection