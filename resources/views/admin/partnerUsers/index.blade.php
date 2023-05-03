@extends('layouts.admin')
@section('content')
@can('partner_user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.partner-users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.partnerUser.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PartnerUser', 'route' => 'admin.partner-users.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.partnerUser.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PartnerUser">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.partnerUser.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.partnerUser.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.partnerUser.fields.password') }}
                        </th>
                        <th>
                            {{ trans('cruds.partnerUser.fields.username') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partnerUsers as $key => $partnerUser)
                        <tr data-entry-id="{{ $partnerUser->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $partnerUser->id ?? '' }}
                            </td>
                            <td>
                                {{ $partnerUser->email ?? '' }}
                            </td>
                            <td>
                                {{ $partnerUser->password ?? '' }}
                            </td>
                            <td>
                                {{ $partnerUser->username ?? '' }}
                            </td>
                            <td>
                                @can('partner_user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.partner-users.show', $partnerUser->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('partner_user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.partner-users.edit', $partnerUser->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('partner_user_delete')
                                    <form action="{{ route('admin.partner-users.destroy', $partnerUser->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('partner_user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.partner-users.massDestroy') }}",
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
  let table = $('.datatable-PartnerUser:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection