@extends('layouts.admin')
@section('content')
@can('partner_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.partners.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.partner.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Partner', 'route' => 'admin.partners.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.partner.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Partner">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.district') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.description') }}
                        </th>
                        <th>
                           Status
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partners as $key => $partner)
                        <tr data-entry-id="{{ $partner->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $partner->id ?? '' }}
                            </td>
                            <td>
                                {{ $partner->name ?? '' }}
                            </td>
                            <td>
                                {{ $partner->address ?? '' }}
                            </td>
                            <td>
                                {{ $partner->district ?? '' }}
                            </td>
                            <td>
                                {{ $partner->phone ?? '' }}
                            </td>
                            <td>
                                {{ $partner->description ?? '' }}
                            </td>
                            <td>
                                @if ($partner->status === 0)
                                <span class="badge badge-pill badge-danger">Pending</span>
                                 @elseif ($partner->status === 1) 
                                 <span class="badge badge-pill badge-success">Accepted</span>  
                                 @elseif ($partner->status === 2) 
                                 <span class="badge badge-pill badge-warning">Denied</span>  
                                @endif
                            </td>
                            <td>
                                @can('partner_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.partners.show', $partner->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('partner_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.partners.edit', $partner->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('partner_edit')
                                <a class="btn btn-xs btn-success" href="{{ route('admin.partners.accept', $partner->id) }}">
                                    Accept
                                </a>
                            @endcan
                            @can('partner_edit')
                            <a class="btn btn-xs btn-warning" href="{{ route('admin.partners.deny', $partner->id) }}">
                                Deny
                            </a>
                        @endcan

                                @can('partner_delete')
                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('partner_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.partners.massDestroy') }}",
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
  let table = $('.datatable-Partner:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection