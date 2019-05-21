<?php

namespace App\Models\Bed;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bed\Traits\BedAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Bed extends Model
{
    use BedAttribute;
    
    protected $table = 'bed';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['name', 'bed_category_id', 'number', 'description', 'bedId', 'status', 'hospital_id', 'last_allotted_time', 'last_discharge_time'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public function bed_category()
    {
        return $this->belongsTo('App\Models\BedCategory\BedCategory')->withTrashed();
    }
    
    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

}
