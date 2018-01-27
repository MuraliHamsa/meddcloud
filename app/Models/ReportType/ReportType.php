<?php

namespace App\Models\ReportType;

use Illuminate\Database\Eloquent\Model;
use App\Models\ReportType\Traits\ReportTypeAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportType extends Model
{
    use ReportTypeAttribute;
    
    protected $table = 'report_type';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = [ 'name', 'hospital_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

    
}
