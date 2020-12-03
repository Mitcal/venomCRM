<?php

namespace App\Http\Requests;

use App\MarketSegment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMarketSegmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('market_segment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:market_segments,id',
        ];
    }
}
