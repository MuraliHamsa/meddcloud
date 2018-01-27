<?php

namespace App\Models\BedCategory;

use Illuminate\Database\Eloquent\Model;
use App\Models\BedCategory\Traits\BedCategoryAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class BedCategory extends Model
{
    use BedCategoryAttribute;
    
    protected $table = 'bed_category';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = [ 'category', 'description', 'hospital_id'];

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
