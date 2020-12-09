<?php

namespace App\Http\Controllers\Admin;

use App\CrmStatus;
use App\CustomerStatusChange;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerStatusChangeRequest;
use App\Http\Requests\StoreCustomerStatusChangeRequest;
use App\Http\Requests\UpdateCustomerStatusChangeRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerStatusChangesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_status_change_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerStatusChanges = CustomerStatusChange::with(['old_status', 'new_status'])->get();

        return view('admin.customerStatusChanges.index', compact('customerStatusChanges'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_status_change_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $old_statuses = CrmStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $new_statuses = CrmStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.customerStatusChanges.create', compact('old_statuses', 'new_statuses'));
    }

    public function store(StoreCustomerStatusChangeRequest $request)
    {
        $customerStatusChange = CustomerStatusChange::create($request->all());

        return redirect()->route('admin.customer-status-changes.index');
    }

    public function edit(CustomerStatusChange $customerStatusChange)
    {
        abort_if(Gate::denies('customer_status_change_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $old_statuses = CrmStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $new_statuses = CrmStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customerStatusChange->load('old_status', 'new_status');

        return view('admin.customerStatusChanges.edit', compact('old_statuses', 'new_statuses', 'customerStatusChange'));
    }

    public function update(UpdateCustomerStatusChangeRequest $request, CustomerStatusChange $customerStatusChange)
    {
        $customerStatusChange->update($request->all());

        return redirect()->route('admin.customer-status-changes.index');
    }

    public function show(CustomerStatusChange $customerStatusChange)
    {
        abort_if(Gate::denies('customer_status_change_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerStatusChange->load('old_status', 'new_status');

        return view('admin.customerStatusChanges.show', compact('customerStatusChange'));
    }

    public function destroy(CustomerStatusChange $customerStatusChange)
    {
        abort_if(Gate::denies('customer_status_change_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerStatusChange->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerStatusChangeRequest $request)
    {
        CustomerStatusChange::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
