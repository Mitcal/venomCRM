<?php

namespace App\Http\Requests;

use App\CrmCustomer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCrmCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crm_customer_create');
    }

    public function rules()
    {
        return [
            'date_time'        => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'salesperson'      => [
                'string',
                'required',
            ],
            'first_name'       => [
                'string',
                'required',
            ],
            'last_name'        => [
                'string',
                'nullable',
            ],
            'phone'            => [
                'string',
                'nullable',
            ],
            'email'            => [
                'string',
                'nullable',
            ],
            'address'          => [
                'string',
                'nullable',
            ],
            'address_2'        => [
                'string',
                'nullable',
            ],
            'address_3'        => [
                'string',
                'nullable',
            ],
            'address_town'     => [
                'string',
                'nullable',
            ],
            /*'address_city'     => [
                'string',
                'required',
            ],*/
            'address_county'   => [
                'string',
                'nullable',
            ],
            'address_postcode' => [
                'string',
                'nullable',
            ],
            'address_country'  => [
                'string',
                'nullable',
            ],
            'instagram'        => [
                'string',
                'nullable',
            ],
            'facebook'         => [
                'string',
                'nullable',
            ],
            'social_other'     => [
                'string',
                'nullable',
            ],
            'vehicle_reg'      => [
                'string',
                'min:3',
                'max:10',
                'nullable',
            ],
            'vehicle_make'     => [
                'string',
                'nullable',
            ],
            'vehicle_model'    => [
                'string',
                'nullable',
            ],
            'vehicle_age'      => [
                'string',
                'nullable',
            ],
            'vehicle_colour'   => [
                'string',
                'nullable',
            ],
            /*'job_type_id'      => [
                'required',
                'integer',
            ],
            'status_id'        => [
                'required',
                'integer',
            ],*/
            'job_notes'        => [
                'string',
                'nullable',
            ],
        ];
    }
}
