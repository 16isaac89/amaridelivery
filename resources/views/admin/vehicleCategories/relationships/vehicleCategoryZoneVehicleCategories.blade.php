<div class="m-3">
    @can('zone_vehicle_category_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.zone-vehicle-categories.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.zoneVehicleCategory.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.zoneVehicleCategory.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-vehicleCategoryZoneVehicleCategories">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.zoneVehicleCategory.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.zoneVehicleCategory.fields.zone') }}
                            </th>
                            <th>
                                {{ trans('cruds.zoneVehicleCategory.fields.vehicle_category') }}
                            </th>
                            <th>
                                {{ trans('cruds.zoneVehicleCategory.fields.price') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($zoneVehicleCategories as $key => $zoneVehicleCategory)
                            <tr data-entry-id="{{ $zoneVehicleCategory->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $zoneVehicleCategory->id ?? '' }}
                                </td>
                                <td>
                                    {{ $zoneVehicleCategory->zone->name ?? '' }}
                                </td>
                                <td>
                                    {{ $zoneVehicleCategory->vehicle_category->name ?? '' }}
                                </td>
                                <td>
                                    {{ $zoneVehicleCategory->price ?? '' }}
                                </td>
                                <td>
                                    @can('zone_vehicle_category_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.zone-vehicle-categories.show', $zoneVehicleCategory->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('zone_vehicle_category_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.zone-vehicle-categories.edit', $zoneVehicleCategory->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('zone_vehicle_category_delete')
                                        <form action="{{ route('admin.zone-vehicle-categories.destroy', $zoneVehicleCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('zone_vehicle_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.zone-vehicle-categories.massDestroy') }}",
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
  let table = $('.datatable-vehicleCategoryZoneVehicleCategories:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection