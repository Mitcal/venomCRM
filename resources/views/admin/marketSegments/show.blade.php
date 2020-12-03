@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.marketSegment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.market-segments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.marketSegment.fields.id') }}
                        </th>
                        <td>
                            {{ $marketSegment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marketSegment.fields.title') }}
                        </th>
                        <td>
                            {{ $marketSegment->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marketSegment.fields.description') }}
                        </th>
                        <td>
                            {{ $marketSegment->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.market-segments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#market_segment_crm_customers" role="tab" data-toggle="tab">
                {{ trans('cruds.crmCustomer.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="market_segment_crm_customers">
            @includeIf('admin.marketSegments.relationships.marketSegmentCrmCustomers', ['crmCustomers' => $marketSegment->marketSegmentCrmCustomers])
        </div>
    </div>
</div>

@endsection