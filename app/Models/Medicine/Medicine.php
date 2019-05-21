<?php

namespace App\Models\Medicine;

use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine\Traits\MedicineAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use MedicineAttribute;
    
    protected $table = 'medicine';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['name', 'medicine_category_id', 'price', 'quantity', 'generic', 'company', 'effects', 'expiry_date', 'hospital_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public function medicine_category()
    {
        return $this->belongsTo('App\Models\MedicineCategory\MedicineCategory')->withTrashed();
    }
    
    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

}
