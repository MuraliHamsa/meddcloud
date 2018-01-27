<?php

namespace App\Models\Receptionist;

use Illuminate\Database\Eloquent\Model;
use App\Models\Receptionist\Traits\ReceptionistAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receptionist extends Model
{
    use ReceptionistAttribute;
    
    protected $table = 'receptionist';

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
