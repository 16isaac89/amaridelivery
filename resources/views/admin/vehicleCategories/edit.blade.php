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
                <label class="required" for="pic">Image</label>
                <div class="needsclick dropzone {{ $errors->has('pic') ? 'is-invalid' : '' }}" id="pic-dropzone">
                </div>
                @if($errors->has('pic'))
                    <span class="text-danger">{{ $errors->first('pic') }}</span>
                @endif
                
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
    Dropzone.options.picDropzone = {
    url: '{{ route('admin.vehicle-categories.storeMedia') }}',
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
      $('form').find('input[name="pic"]').remove()
      $('form').append('<input type="hidden" name="pic" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="pic"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($vehicleCategory) && $vehicleCategory->pic)
      var file = {!! json_encode($vehicleCategory->pic) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="pic" value="' + file.file_name + '">')
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