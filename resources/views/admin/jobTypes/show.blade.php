@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jobType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobType.fields.id') }}
                        </th>
                        <td>
                            {{ $jobType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobType.fields.title') }}
                        </th>
                        <td>
                            {{ $jobType->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobType.fields.description') }}
                        </th>
                        <td>
                            {{ $jobType->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobType.fields.category_number') }}
                        </th>
                        <td>
                            {{ $jobType->category_number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-types.index') }}">
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
            <a class="nav-link" href="#job_type_crm_customers" role="tab" data-toggle="tab">
                {{ trans('cruds.crmCustomer.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="job_type_crm_customers">
            @includeIf('admin.jobTypes.relationships.jobTypeCrmCustomers', ['crmCustomers' => $jobType->jobTypeCrmCustomers])
        </div>
    </div>
</div>

@endsection