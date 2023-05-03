@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fleet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fleets.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="manufacturer">{{ trans('cruds.fleet.fields.manufacturer') }}</label>
                <input class="form-control {{ $errors->has('manufacturer') ? 'is-invalid' : '' }}" type="text" name="manufacturer" id="manufacturer" value="{{ old('manufacturer', '') }}" required>
                @if($errors->has('manufacturer'))
                    <span class="text-danger">{{ $errors->first('manufacturer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fleet.fields.manufacturer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.fleet.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fleet.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pic">{{ trans('cruds.fleet.fields.pic') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pic') ? 'is-invalid' : '' }}" id="pic-dropzone">
                </div>
                @if($errors->has('pic'))
                    <span class="text-danger">{{ $errors->first('pic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fleet.fields.pic_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.fleet.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number" id="number" value="{{ old('number', '') }}" required>
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fleet.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otherpapapers">{{ trans('cruds.fleet.fields.otherpapapers') }}</label>
                <div class="needsclick dropzone {{ $errors->has('otherpapapers') ? 'is-invalid' : '' }}" id="otherpapapers-dropzone">
                </div>
                @if($errors->has('otherpapapers'))
                    <span class="text-danger">{{ $errors->first('otherpapapers') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fleet.fields.otherpapapers_helper') }}</span>
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
    url: '{{ route('admin.fleets.storeMedia') }}',
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
@if(isset($fleet) && $fleet->pic)
      var file = {!! json_encode($fleet->pic) !!}
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
<script>
    var uploadedOtherpapapersMap = {}
Dropzone.options.otherpapapersDropzone = {
    url: '{{ route('admin.fleets.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="otherpapapers[]" value="' + response.name + '">')
      uploadedOtherpapapersMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedOtherpapapersMap[file.name]
      }
      $('form').find('input[name="otherpapapers[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($fleet) && $fleet->otherpapapers)
      var files = {!! json_encode($fleet->otherpapapers) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="otherpapapers[]" value="' + file.file_name + '">')
        }
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