@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addre.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.addres.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addre.fields.id') }}
                        </th>
                        <td>
                            {{ $addre->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addre.fields.name') }}
                        </th>
                        <td>
                            {{ $addre->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addre.fields.value') }}
                        </th>
                        <td>
                            {{ $addre->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.addres.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection