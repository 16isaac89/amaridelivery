@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.route.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.routes.update", [$route->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.route.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $route->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.route.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.route.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $route->location) }}">
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.route.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="places">{{ trans('cruds.route.fields.places') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('places') ? 'is-invalid' : '' }}" name="places[]" id="places" multiple required>
                    @foreach($places as $id => $place)
                        <option value="{{ $id }}" {{ (in_array($id, old('places', [])) || $route->places->contains($id)) ? 'selected' : '' }}>{{ $place }}</option>
                    @endforeach
                </select>
                @if($errors->has('places'))
                    <span class="text-danger">{{ $errors->first('places') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.route.fields.places_helper') }}</span>
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