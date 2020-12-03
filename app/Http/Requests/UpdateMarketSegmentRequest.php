<?php

namespace App\Http\Requests;

use App\MarketSegment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMarketSegmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('market_segment_edit');
    }

    public function rules()
    {
        return [
            'title'       => [
                'string',
                'required',
                'unique:market_segments,title,' . request()->route('market_segment')->id,
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
