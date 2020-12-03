<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMarketSegmentRequest;
use App\Http\Requests\UpdateMarketSegmentRequest;
use App\Http\Resources\Admin\MarketSegmentResource;
use App\MarketSegment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MarketSegmentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('market_segment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MarketSegmentResource(MarketSegment::all());
    }

    public function store(StoreMarketSegmentRequest $request)
    {
        $marketSegment = MarketSegment::create($request->all());

        return (new MarketSegmentResource($marketSegment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MarketSegment $marketSegment)
    {
        abort_if(Gate::denies('market_segment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MarketSegmentResource($marketSegment);
    }

    public function update(UpdateMarketSegmentRequest $request, MarketSegment $marketSegment)
    {
        $marketSegment->update($request->all());

        return (new MarketSegmentResource($marketSegment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MarketSegment $marketSegment)
    {
        abort_if(Gate::denies('market_segment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $marketSegment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
