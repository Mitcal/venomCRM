<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMarketSegmentRequest;
use App\Http\Requests\StoreMarketSegmentRequest;
use App\Http\Requests\UpdateMarketSegmentRequest;
use App\MarketSegment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MarketSegmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('market_segment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $marketSegments = MarketSegment::all();

        return view('admin.marketSegments.index', compact('marketSegments'));
    }

    public function create()
    {
        abort_if(Gate::denies('market_segment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.marketSegments.create');
    }

    public function store(StoreMarketSegmentRequest $request)
    {
        $marketSegment = MarketSegment::create($request->all());

        return redirect()->route('admin.market-segments.index');
    }

    public function edit(MarketSegment $marketSegment)
    {
        abort_if(Gate::denies('market_segment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.marketSegments.edit', compact('marketSegment'));
    }

    public function update(UpdateMarketSegmentRequest $request, MarketSegment $marketSegment)
    {
        $marketSegment->update($request->all());

        return redirect()->route('admin.market-segments.index');
    }

    public function show(MarketSegment $marketSegment)
    {
        abort_if(Gate::denies('market_segment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $marketSegment->load('marketSegmentCrmCustomers');

        return view('admin.marketSegments.show', compact('marketSegment'));
    }

    public function destroy(MarketSegment $marketSegment)
    {
        abort_if(Gate::denies('market_segment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $marketSegment->delete();

        return back();
    }

    public function massDestroy(MassDestroyMarketSegmentRequest $request)
    {
        MarketSegment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
