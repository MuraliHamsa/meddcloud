<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Model;
use App\Models\Report\Traits\ReportAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use ReportAttribute;
    
    protected $table = 'report';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['report_type_id', 'description', 'patient_id', 'doctor_id', 'add_date', 'hospital_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public function report_type()
    {
        return $this->belongsTo('App\Models\ReportType\ReportType')->withTrashed();
    }
    
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient\Patient')->withTrashed();
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor\Doctor')->withTrashed();
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

    
}
