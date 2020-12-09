<?php

namespace App\Http\Requests;

use App\CustomerStatusChange;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerStatusChangeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_status_change_create');
    }

    public function rules()
    {
        return [
            'old_status_id' => [
                'required',
                'integer',
            ],
            'new_status_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
