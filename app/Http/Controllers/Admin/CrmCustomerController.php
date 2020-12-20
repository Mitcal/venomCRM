<?php

namespace App\Http\Controllers\Admin;

use App\CrmCustomer;
use App\CrmStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCrmCustomerRequest;
use App\Http\Requests\StoreCrmCustomerRequest;
use App\Http\Requests\UpdateCrmCustomerRequest;
use App\JobType;
use App\User;
use App\LeadSource;
use App\MarketSegment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CrmCustomerController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('crm_customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CrmCustomer::with(['lead_source', 'market_segment', 'job_type', 'status'])->select(sprintf('%s.*', (new CrmCustomer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'crm_customer_show';
                $editGate      = 'crm_customer_edit';
                $deleteGate    = 'crm_customer_delete';
                $crudRoutePart = 'crm-customers';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->editColumn('salesperson', function ($row) {
                return $row->salesperson ? $row->salesperson : "";
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? CrmCustomer::TITLE_SELECT[$row->title] : '';
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : "";
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : "";
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : "";
            });
            $table->editColumn('address_3', function ($row) {
                return $row->address_3 ? $row->address_3 : "";
            });
            $table->addColumn('lead_source_title', function ($row) {
                return $row->lead_source ? $row->lead_source->title : '';
            });

            $table->editColumn('vehicle_reg', function ($row) {
                return $row->vehicle_reg ? $row->vehicle_reg : "";
            });
            $table->editColumn('vehicle_make', function ($row) {
                return $row->vehicle_make ? $row->vehicle_make : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->editColumn('vehicle_model', function ($row) {
                return $row->vehicle_model ? $row->vehicle_model : "";
            });
            $table->addColumn('market_segment_title', function ($row) {
                return $row->market_segment ? $row->market_segment->title : '';
            });

            $table->editColumn('market_segment.description', function ($row) {
                return $row->market_segment ? (is_string($row->market_segment) ? $row->market_segment : $row->market_segment->description) : '';
            });
            $table->addColumn('job_type_title', function ($row) {
                return $row->job_type ? $row->job_type->title : '';
            });

            $table->editColumn('job_type.description', function ($row) {
                return $row->job_type ? (is_string($row->job_type) ? $row->job_type : $row->job_type->description) : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : "";
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'lead_source', 'market_segment', 'job_type', 'status']);

            return $table->make(true);
        }

        return view('admin.crmCustomers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crm_customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead_sources = LeadSource::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $market_segments = MarketSegment::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = JobType::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = CrmStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

	$users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.crmCustomers.create', compact('lead_sources', 'market_segments', 'job_types', 'statuses', 'users'));
    }

    public function store(StoreCrmCustomerRequest $request)
    {
        $crmCustomer = CrmCustomer::create($request->all());

        return redirect()->route('admin.crm-customers.index');
    }

    public function edit(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead_sources = LeadSource::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $market_segments = MarketSegment::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = JobType::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = CrmStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crmCustomer->load('lead_source', 'market_segment', 'job_type', 'status');

	$users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.crmCustomers.edit', compact('lead_sources', 'market_segments', 'job_types', 'statuses', 'crmCustomer', 'users'));
    }

    public function update(UpdateCrmCustomerRequest $request, CrmCustomer $crmCustomer)
    {
        $crmCustomer->update($request->all());

        return redirect()->route('admin.crm-customers.index');
    }

    public function show(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomer->load('lead_source', 'market_segment', 'job_type', 'status');

        return view('admin.crmCustomers.show', compact('crmCustomer'));
    }

    public function destroy(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomer->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmCustomerRequest $request)
    {
        CrmCustomer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
