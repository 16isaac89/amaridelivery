<div class="m-3">
    @can('driver_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.drivers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.driver.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.driver.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-routesDrivers">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.driver.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.driver.fields.fullname') }}
                            </th>
                            <th>
                                {{ trans('cruds.driver.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.driver.fields.phone_1') }}
                            </th>
                            <th>
                                {{ trans('cruds.driver.fields.photo') }}
                            </th>
                            <th>
                                {{ trans('cruds.driver.fields.idphoto') }}
                            </th>
                            <th>
                                {{ trans('cruds.driver.fields.password') }}
                            </th>
                            <th>
                                {{ trans('cruds.driver.fields.routes') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($drivers as $key => $driver)
                            <tr data-entry-id="{{ $driver->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $driver->id ?? '' }}
                                </td>
                                <td>
                                    {{ $driver->fullname ?? '' }}
                                </td>
                                <td>
                                    {{ $driver->email ?? '' }}
                                </td>
                                <td>
                                    {{ $driver->phone_1 ?? '' }}
                                </td>
                                <td>
                                    @if($driver->photo)
                                        <a href="{{ $driver->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $driver->photo->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if($driver->idphoto)
                                        <a href="{{ $driver->idphoto->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $driver->idphoto->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $driver->password ?? '' }}
                                </td>
                                <td>
                                    @foreach($driver->routes as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('driver_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.drivers.show', $driver->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('driver_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.drivers.edit', $driver->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('driver_delete')
                                        <form action="{{ route('admin.drivers.destroy', $driver->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('driver_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.drivers.massDestroy') }}",
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
  let table = $('.datatable-routesDrivers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection