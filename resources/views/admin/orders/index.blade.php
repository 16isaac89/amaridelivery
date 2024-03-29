@extends('layouts.admin')
@section('content')
@can('order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.order.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Order', 'route' => 'admin.orders.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.order.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.size') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.from') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.to') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.money') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.datetime') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.driver') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.fullname') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.route') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $order)
                        <tr data-entry-id="{{ $order->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $order->id ?? '' }}
                            </td>
                            <td>
                                {{ $order->size ?? '' }}
                            </td>
                            <td>
                                {{ $order->from ?? '' }}
                            </td>
                            <td>
                                {{ $order->to ?? '' }}
                            </td>
                            <td>
                                {{ $order->money ?? '' }}
                            </td>
                            <td>
                                {{ $order->datetime ?? '' }}
                            </td>
                            <td>
                                @if ($order->status === 'pending')
                                <span class="badge rounded-pill bg-warning text-dark">Pending</span>
                                @elseif ($order->status === 'assigned')
                                <span class="badge rounded-pill bg-primary text-dark">Assigned</span>
                                @elseif ($order->status === 'canceled')
                                <span class="badge rounded-pill bg-danger text-dark">Canceled</span>
                                @elseif ($order->status === 'completed')
                                <span class="badge rounded-pill bg-success text-dark">Completed</span>
                                @endif
                            </td>
                            <td>
                                {{ $order->driver->phone_1 ?? '' }}
                            </td>
                            <td>
                                {{ $order->driver->fullname ?? '' }}
                            </td>
                            <td>
                                {{ $order->route->name ?? '' }}
                            </td>
                            <td>
                                @can('order_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.orders.show', $order->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('order_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.orders.edit', $order->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('order_delete')
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                                @can('order_assign')
                                @if ($order->status === 'pending')
                                <a class="btn btn-xs btn-success" href="{{ route('admin.assignorder.view', $order->id) }}">
                                   Assign
                                </a>
                                @elseif ($order->status === 'assigned')
                                <a class="btn btn-xs btn-warning" href="{{ route('admin.assignorder.view', $order->id) }}">
                                    Reassign
                                </a>
                                @endif
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
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.orders.massDestroy') }}",
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
  let table = $('.datatable-Order:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
