@extends('layouts.admin')
@section('content')
@can('fleet_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.fleets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.fleet.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Fleet', 'route' => 'admin.fleets.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.fleet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Fleet">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fleet.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fleet.fields.manufacturer') }}
                        </th>
                        <th>
                            {{ trans('cruds.fleet.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.fleet.fields.pic') }}
                        </th>
                        <th>
                            {{ trans('cruds.fleet.fields.number') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fleets as $key => $fleet)
                        <tr data-entry-id="{{ $fleet->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $fleet->id ?? '' }}
                            </td>
                            <td>
                                {{ $fleet->manufacturer ?? '' }}
                            </td>
                            <td>
                                {{ $fleet->name ?? '' }}
                            </td>
                            <td>
                                @if($fleet->pic)
                                    <a href="{{ $fleet->pic->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $fleet->pic->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $fleet->number ?? '' }}
                            </td>
                            <td>
                                @can('fleet_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.fleets.show', $fleet->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('fleet_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.fleets.edit', $fleet->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('fleet_delete')
                                    <form action="{{ route('admin.fleets.destroy', $fleet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('fleet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.fleets.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Fleet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection