@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fleet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fleets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fleet.fields.id') }}
                        </th>
                        <td>
                            {{ $fleet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fleet.fields.manufacturer') }}
                        </th>
                        <td>
                            {{ $fleet->manufacturer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fleet.fields.name') }}
                        </th>
                        <td>
                            {{ $fleet->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fleet.fields.pic') }}
                        </th>
                        <td>
                            @if($fleet->pic)
                                <a href="{{ $fleet->pic->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $fleet->pic->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fleet.fields.number') }}
                        </th>
                        <td>
                            {{ $fleet->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fleet.fields.otherpapapers') }}
                        </th>
                        <td>
                            @foreach($fleet->otherpapapers as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fleets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection