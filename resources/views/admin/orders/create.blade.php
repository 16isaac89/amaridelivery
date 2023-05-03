@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="size">{{ trans('cruds.order.fields.size') }}</label>
                <input class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" type="text" name="size" id="size" value="{{ old('size', '') }}" required>
                @if($errors->has('size'))
                    <span class="text-danger">{{ $errors->first('size') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vehicle">{{ trans('cruds.order.fields.vehicle') }}</label>
                <input class="form-control {{ $errors->has('vehicle') ? 'is-invalid' : '' }}" type="text" name="vehicle" id="vehicle" value="{{ old('vehicle', '') }}" required>
                @if($errors->has('vehicle'))
                    <span class="text-danger">{{ $errors->first('vehicle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.vehicle_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from">{{ trans('cruds.order.fields.from') }}</label>
                <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="text" name="from" id="from" value="{{ old('from', '') }}" required>
                @if($errors->has('from'))
                    <span class="text-danger">{{ $errors->first('from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="to">{{ trans('cruds.order.fields.to') }}</label>
                <input class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}" type="text" name="to" id="to" value="{{ old('to', '') }}" required>
                @if($errors->has('to'))
                    <span class="text-danger">{{ $errors->first('to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.to_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="money">{{ trans('cruds.order.fields.money') }}</label>
                <input class="form-control {{ $errors->has('money') ? 'is-invalid' : '' }}" type="text" name="money" id="money" value="{{ old('money', '') }}">
                @if($errors->has('money'))
                    <span class="text-danger">{{ $errors->first('money') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.money_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="datetime">{{ trans('cruds.order.fields.datetime') }}</label>
                <input class="form-control datetime {{ $errors->has('datetime') ? 'is-invalid' : '' }}" type="text" name="datetime" id="datetime" value="{{ old('datetime') }}">
                @if($errors->has('datetime'))
                    <span class="text-danger">{{ $errors->first('datetime') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.datetime_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.order.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_id">{{ trans('cruds.order.fields.driver') }}</label>
                <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id">
                    @foreach($drivers as $id => $entry)
                        <option value="{{ $id }}" {{ old('driver_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver'))
                    <span class="text-danger">{{ $errors->first('driver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.driver_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="route_id">{{ trans('cruds.order.fields.route') }}</label>
                <select class="form-control select2 {{ $errors->has('route') ? 'is-invalid' : '' }}" name="route_id" id="route_id">
                    @foreach($routes as $id => $entry)
                        <option value="{{ $id }}" {{ old('route_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('route'))
                    <span class="text-danger">{{ $errors->first('route') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.route_helper') }}</span>
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