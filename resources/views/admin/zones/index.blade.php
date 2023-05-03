@extends('layouts.admin')
@section('content')
@can('zone_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.zones.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.zone.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Zone', 'route' => 'admin.zones.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.zone.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Zone">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.zone.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.zone.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.zone.fields.from') }}
                        </th>
                        <th>
                            {{ trans('cruds.zone.fields.to') }}
                        </th>
                        <th>
                            {{ trans('cruds.zone.fields.distance') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($zones as $key => $zone)
                        <tr data-entry-id="{{ $zone->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $zone->id ?? '' }}
                            </td>
                            <td>
                                {{ $zone->name ?? '' }}
                            </td>
                            <td>
                                {{ $zone->from ?? '' }}
                            </td>
                            <td>
                                {{ $zone->to ?? '' }}
                            </td>
                            <td>
                                {{ $zone->distance ?? '' }}
                            </td>
                            <td>
                                @can('zone_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.zones.show', $zone->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('zone_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.zones.edit', $zone->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('zone_delete')
                                    <form action="{{ route('admin.zones.destroy', $zone->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('zone_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.zones.massDestroy') }}",
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
  let table = $('.datatable-Zone:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection