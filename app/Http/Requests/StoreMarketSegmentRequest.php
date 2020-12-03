<?php

namespace App\Http\Requests;

use App\MarketSegment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMarketSegmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('market_segment_create');
    }

    public function rules()
    {
        return [
            'title'       => [
                'string',
                'required',
                'unique:market_segments',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
