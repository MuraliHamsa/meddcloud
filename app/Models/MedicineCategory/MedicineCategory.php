<?php

namespace App\Models\MedicineCategory;

use Illuminate\Database\Eloquent\Model;
use App\Models\MedicineCategory\Traits\MedicineCategoryAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineCategory extends Model
{
    use MedicineCategoryAttribute;
    
    protected $table = 'medicine_category';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = [ 'name', 'description', 'hospital_id'];

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
