<?php

namespace App\Models\BedAllotment;

use Illuminate\Database\Eloquent\Model;
use App\Models\BedAllotment\Traits\BedAllotmentAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class BedAllotment extends Model
{
    use BedAllotmentAttribute;
    
    protected $table = 'allotment_bed';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['bed_id', 'patient_id', 'allotted_time', 'discharge_time', 'status', 'hospital_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public function bed()
    {
        return $this->belongsTo('App\Models\Bed\Bed')->withTrashed();
    }
    
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient\Patient')->withTrashed();
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

}
