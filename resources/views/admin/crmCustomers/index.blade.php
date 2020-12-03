@extends('layouts.admin')
@section('content')
@can('crm_customer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.crm-customers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.crmCustomer.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'CrmCustomer', 'route' => 'admin.crm-customers.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.crmCustomer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-CrmCustomer">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.date_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.salesperson') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.first_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.address_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.lead_source') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.vehicle_reg') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.vehicle_make') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.vehicle_model') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.market_segment') }}
                    </th>
                    <th>
                        {{ trans('cruds.marketSegment.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.job_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.jobType.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.crmCustomer.fields.status') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('crm_customer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.crm-customers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.crm-customers.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'date_time', name: 'date_time' },
{ data: 'salesperson', name: 'salesperson' },
{ data: 'title', name: 'title' },
{ data: 'first_name', name: 'first_name' },
{ data: 'last_name', name: 'last_name' },
{ data: 'phone', name: 'phone' },
{ data: 'email', name: 'email' },
{ data: 'address', name: 'address' },
{ data: 'address_3', name: 'address_3' },
{ data: 'lead_source_title', name: 'lead_source.title' },
{ data: 'vehicle_reg', name: 'vehicle_reg' },
{ data: 'vehicle_make', name: 'vehicle_make' },
{ data: 'description', name: 'description' },
{ data: 'vehicle_model', name: 'vehicle_model' },
{ data: 'market_segment_title', name: 'market_segment.title' },
{ data: 'market_segment.description', name: 'market_segment.description' },
{ data: 'job_type_title', name: 'job_type.title' },
{ data: 'job_type.description', name: 'job_type.description' },
{ data: 'price', name: 'price' },
{ data: 'status_name', name: 'status.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-CrmCustomer').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection