<div class="m-3">
    @can('customer_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.customers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.customer.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.customer.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-partnerCustomers">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.customer.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.customer.fields.firstname') }}
                            </th>
                            <th>
                                {{ trans('cruds.customer.fields.secondname') }}
                            </th>
                            <th>
                                {{ trans('cruds.customer.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.customer.fields.profilepic') }}
                            </th>
                            <th>
                                {{ trans('cruds.customer.fields.phone_1') }}
                            </th>
                            <th>
                                {{ trans('cruds.customer.fields.phone_2') }}
                            </th>
                            <th>
                                {{ trans('cruds.customer.fields.partner') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $key => $customer)
                            <tr data-entry-id="{{ $customer->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $customer->id ?? '' }}
                                </td>
                                <td>
                                    {{ $customer->firstname ?? '' }}
                                </td>
                                <td>
                                    {{ $customer->secondname ?? '' }}
                                </td>
                                <td>
                                    {{ $customer->email ?? '' }}
                                </td>
                                <td>
                                    @if($customer->profilepic)
                                        <a href="{{ $customer->profilepic->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $customer->profilepic->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $customer->phone_1 ?? '' }}
                                </td>
                                <td>
                                    {{ $customer->phone_2 ?? '' }}
                                </td>
                                <td>
                                    {{ $customer->partner->name ?? '' }}
                                </td>
                                <td>
                                    @can('customer_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.customers.show', $customer->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('customer_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.customers.edit', $customer->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('customer_delete')
                                        <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('customer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.customers.massDestroy') }}",
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
  let table = $('.datatable-partnerCustomers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection