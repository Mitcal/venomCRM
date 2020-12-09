<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CustomerStatusChange;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerStatusChangeRequest;
use App\Http\Requests\UpdateCustomerStatusChangeRequest;
use App\Http\Resources\Admin\CustomerStatusChangeResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerStatusChangesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_status_change_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerStatusChangeResource(CustomerStatusChange::with(['old_status', 'new_status'])->get());
    }

    public function store(StoreCustomerStatusChangeRequest $request)
    {
        $customerStatusChange = CustomerStatusChange::create($request->all());

        return (new CustomerStatusChangeResource($customerStatusChange))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerStatusChange $customerStatusChange)
    {
        abort_if(Gate::denies('customer_status_change_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerStatusChangeResource($customerStatusChange->load(['old_status', 'new_status']));
    }

    public function update(UpdateCustomerStatusChangeRequest $request, CustomerStatusChange $customerStatusChange)
    {
        $customerStatusChange->update($request->all());

        return (new CustomerStatusChangeResource($customerStatusChange))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerStatusChange $customerStatusChange)
    {
        abort_if(Gate::denies('customer_status_change_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerStatusChange->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
