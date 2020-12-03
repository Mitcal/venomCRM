<?php

namespace App\Http\Requests;

use App\JobType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJobTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_type_edit');
    }

    public function rules()
    {
        return [
            'title'           => [
                'string',
                'required',
                'unique:job_types,title,' . request()->route('job_type')->id,
            ],
            'description'     => [
                'string',
                'nullable',
            ],
            'category_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
