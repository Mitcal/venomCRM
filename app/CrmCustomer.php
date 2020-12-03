<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CrmCustomer extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'crm_customers';

    protected $dates = [
        'date_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TITLE_SELECT = [
        'Mr'   => 'Mr',
        'Mrs'  => 'Mrs',
        'Miss' => 'Miss',
        'Ms'   => 'Ms',
        'Dr'   => 'Dr',
    ];

    protected $fillable = [
        'date_time',
        'salesperson',
        'title',
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
        'address_2',
        'address_3',
        'address_town',
        'address_city',
        'address_county',
        'address_postcode',
        'address_country',
        'instagram',
        'facebook',
        'social_other',
        'lead_source_id',
        'vehicle_reg',
        'vehicle_make',
        'description',
        'vehicle_model',
        'vehicle_age',
        'vehicle_colour',
        'market_segment_id',
        'job_type_id',
        'price',
        'status_id',
        'job_notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateTimeAttribute($value)
    {
        $this->attributes['date_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function lead_source()
    {
        return $this->belongsTo(LeadSource::class, 'lead_source_id');
    }

    public function market_segment()
    {
        return $this->belongsTo(MarketSegment::class, 'market_segment_id');
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function status()
    {
        return $this->belongsTo(CrmStatus::class, 'status_id');
    }
}
