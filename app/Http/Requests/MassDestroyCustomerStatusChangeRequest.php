<?php

namespace App\Http\Requests;

use App\CustomerStatusChange;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCustomerStatusChangeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_status_change_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:customer_status_changes,id',
        ];
    }
}
