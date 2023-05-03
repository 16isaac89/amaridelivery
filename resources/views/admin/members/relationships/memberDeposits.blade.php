<div class="m-3">
    @can('deposit_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.deposits.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.deposit.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.deposit.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-memberDeposits">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.deposit.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.deposit.fields.member') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.phone') }}
                            </th>
                            <th>
                                {{ trans('cruds.deposit.fields.amount') }}
                            </th>
                            <th>
                                {{ trans('cruds.deposit.fields.payment_method') }}
                            </th>
                            <th>
                                {{ trans('cruds.deposit.fields.transaction') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deposits as $key => $deposit)
                            <tr data-entry-id="{{ $deposit->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $deposit->id ?? '' }}
                                </td>
                                <td>
                                    {{ $deposit->member->firstname ?? '' }}
                                </td>
                                <td>
                                    {{ $deposit->member->email ?? '' }}
                                </td>
                                <td>
                                    {{ $deposit->member->phone ?? '' }}
                                </td>
                                <td>
                                    {{ $deposit->amount ?? '' }}
                                </td>
                                <td>
                                    {{ $deposit->payment_method ?? '' }}
                                </td>
                                <td>
                                    {{ $deposit->transaction ?? '' }}
                                </td>
                                <td>
                                    @can('deposit_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.deposits.show', $deposit->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('deposit_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.deposits.edit', $deposit->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('deposit_delete')
                                        <form action="{{ route('admin.deposits.destroy', $deposit->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('deposit_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.deposits.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-memberDeposits:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection