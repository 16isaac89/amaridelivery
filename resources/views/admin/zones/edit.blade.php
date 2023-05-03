@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.zone.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.zones.update", [$zone->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.zone.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $zone->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zone.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="from">{{ trans('cruds.zone.fields.from') }}</label>
                <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="number" name="from" id="from" value="{{ old('from', $zone->from) }}" step="1">
                @if($errors->has('from'))
                    <span class="text-danger">{{ $errors->first('from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zone.fields.from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="to">{{ trans('cruds.zone.fields.to') }}</label>
                <input class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}" type="number" name="to" id="to" value="{{ old('to', $zone->to) }}" step="1">
                @if($errors->has('to'))
                    <span class="text-danger">{{ $errors->first('to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zone.fields.to_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="distance">{{ trans('cruds.zone.fields.distance') }}</label>
                <input class="form-control {{ $errors->has('distance') ? 'is-invalid' : '' }}" type="number" name="distance" id="distance" value="{{ old('distance', $zone->distance) }}" step="1">
                @if($errors->has('distance'))
                    <span class="text-danger">{{ $errors->first('distance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zone.fields.distance_helper') }}</span>
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