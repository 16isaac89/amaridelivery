@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assignorder.post",[$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
          
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
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection