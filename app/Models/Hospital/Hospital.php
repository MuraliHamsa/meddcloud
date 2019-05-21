<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hospital\Traits\HospitalAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use HospitalAttribute;
    
    protected $table = 'hospital';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'address', 'active', 'user_id'];

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
}
