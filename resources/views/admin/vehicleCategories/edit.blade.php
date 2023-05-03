@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.vehicleCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vehicle-categories.update", [$vehicleCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.vehicleCategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $vehicleCategory->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleCategory.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="base">{{ trans('cruds.vehicleCategory.fields.base') }}</label>
                <input class="form-control {{ $errors->has('base') ? 'is-invalid' : '' }}" type="number" name="base" id="base" value="{{ old('base', $vehicleCategory->base) }}" step="0.01">
                @if($errors->has('base'))
                    <span class="text-danger">{{ $errors->first('base') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleCategory.fields.base_helper') }}</span>
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