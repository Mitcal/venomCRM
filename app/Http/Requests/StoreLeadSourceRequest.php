<?php

namespace App\Http\Requests;

use App\LeadSource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLeadSourceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lead_source_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:lead_sources',
            ],
        ];
    }
}
