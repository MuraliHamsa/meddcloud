<?php

namespace App\Models\Pharmacist;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pharmacist\Traits\PharmacistAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pharmacist extends Model
{
    use PharmacistAttribute;
    
    protected $table = 'pharmacist';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['image', 'name', 'address', 'phone', 'hospital_id', 'email', 'user_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

    
}
