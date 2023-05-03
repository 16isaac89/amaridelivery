@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.zoneVehicleCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.zone-vehicle-categories.update", [$zoneVehicleCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="zone_id">{{ trans('cruds.zoneVehicleCategory.fields.zone') }}</label>
                <select class="form-control select2 {{ $errors->has('zone') ? 'is-invalid' : '' }}" name="zone_id" id="zone_id">
                    @foreach($zones as $id => $entry)
                        <option value="{{ $id }}" {{ (old('zone_id') ? old('zone_id') : $zoneVehicleCategory->zone->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('zone'))
                    <span class="text-danger">{{ $errors->first('zone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zoneVehicleCategory.fields.zone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vehicle_category_id">{{ trans('cruds.zoneVehicleCategory.fields.vehicle_category') }}</label>
                <select class="form-control select2 {{ $errors->has('vehicle_category') ? 'is-invalid' : '' }}" name="vehicle_category_id" id="vehicle_category_id">
                    @foreach($vehicle_categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('vehicle_category_id') ? old('vehicle_category_id') : $zoneVehicleCategory->vehicle_category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('vehicle_category'))
                    <span class="text-danger">{{ $errors->first('vehicle_category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zoneVehicleCategory.fields.vehicle_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.zoneVehicleCategory.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $zoneVehicleCategory->price) }}" step="1" required>
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zoneVehicleCategory.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection