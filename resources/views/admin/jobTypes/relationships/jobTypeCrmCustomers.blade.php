@can('crm_customer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.crm-customers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.crmCustomer.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.crmCustomer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-jobTypeCrmCustomers">
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
                <tbody>
                    @foreach($crmCustomers as $key => $crmCustomer)
                        <tr data-entry-id="{{ $crmCustomer->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $crmCustomer->id ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->date_time ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->salesperson ?? '' }}
                            </td>
                            <td>
                                {{ App\CrmCustomer::TITLE_SELECT[$crmCustomer->title] ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->phone ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->email ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->address ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->address_3 ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->lead_source->title ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->vehicle_reg ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->vehicle_make ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->description ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->vehicle_model ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->market_segment->title ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->market_segment->description ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->job_type->title ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->job_type->description ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->price ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->status->name ?? '' }}
                            </td>
                            <td>
                                @can('crm_customer_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.crm-customers.show', $crmCustomer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('crm_customer_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.crm-customers.edit', $crmCustomer->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('crm_customer_delete')
                                    <form action="{{ route('admin.crm-customers.destroy', $crmCustomer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('crm_customer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.crm-customers.massDestroy') }}",
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
  let table = $('.datatable-jobTypeCrmCustomers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection