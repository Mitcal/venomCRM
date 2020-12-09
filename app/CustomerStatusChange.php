<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CustomerStatusChange extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'customer_status_changes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'old_status_id',
        'new_status_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function old_status()
    {
        return $this->belongsTo(CrmStatus::class, 'old_status_id');
    }

    public function new_status()
    {
        return $this->belongsTo(CrmStatus::class, 'new_status_id');
    }
}
