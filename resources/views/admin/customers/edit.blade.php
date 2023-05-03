@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customers.update", [$customer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="firstname">{{ trans('cruds.customer.fields.firstname') }}</label>
                <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" type="text" name="firstname" id="firstname" value="{{ old('firstname', $customer->firstname) }}" required>
                @if($errors->has('firstname'))
                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.firstname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="secondname">{{ trans('cruds.customer.fields.secondname') }}</label>
                <input class="form-control {{ $errors->has('secondname') ? 'is-invalid' : '' }}" type="text" name="secondname" id="secondname" value="{{ old('secondname', $customer->secondname) }}" required>
                @if($errors->has('secondname'))
                    <span class="text-danger">{{ $errors->first('secondname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.secondname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thirdname">{{ trans('cruds.customer.fields.thirdname') }}</label>
                <input class="form-control {{ $errors->has('thirdname') ? 'is-invalid' : '' }}" type="text" name="thirdname" id="thirdname" value="{{ old('thirdname', $customer->thirdname) }}">
                @if($errors->has('thirdname'))
                    <span class="text-danger">{{ $errors->first('thirdname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.thirdname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.customer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profilepic">{{ trans('cruds.customer.fields.profilepic') }}</label>
                <div class="needsclick dropzone {{ $errors->has('profilepic') ? 'is-invalid' : '' }}" id="profilepic-dropzone">
                </div>
                @if($errors->has('profilepic'))
                    <span class="text-danger">{{ $errors->first('profilepic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.profilepic_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_1">{{ trans('cruds.customer.fields.phone_1') }}</label>
                <input class="form-control {{ $errors->has('phone_1') ? 'is-invalid' : '' }}" type="text" name="phone_1" id="phone_1" value="{{ old('phone_1', $customer->phone_1) }}" required>
                @if($errors->has('phone_1'))
                    <span class="text-danger">{{ $errors->first('phone_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.phone_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_2">{{ trans('cruds.customer.fields.phone_2') }}</label>
                <input class="form-control {{ $errors->has('phone_2') ? 'is-invalid' : '' }}" type="text" name="phone_2" id="phone_2" value="{{ old('phone_2', $customer->phone_2) }}">
                @if($errors->has('phone_2'))
                    <span class="text-danger">{{ $errors->first('phone_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.phone_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('cruds.customer.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partner_id">{{ trans('cruds.customer.fields.partner') }}</label>
                <select class="form-control select2 {{ $errors->has('partner') ? 'is-invalid' : '' }}" name="partner_id" id="partner_id">
                    @foreach($partners as $id => $entry)
                        <option value="{{ $id }}" {{ (old('partner_id') ? old('partner_id') : $customer->partner->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('partner'))
                    <span class="text-danger">{{ $errors->first('partner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.partner_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.profilepicDropzone = {
    url: '{{ route('admin.customers.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="profilepic"]').remove()
      $('form').append('<input type="hidden" name="profilepic" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="profilepic"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($customer) && $customer->profilepic)
      var file = {!! json_encode($customer->profilepic) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="profilepic" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection