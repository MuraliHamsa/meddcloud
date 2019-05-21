<?php

namespace App\Models\Laboratorist;

use Illuminate\Database\Eloquent\Model;
use App\Models\Laboratorist\Traits\LaboratoristAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laboratorist extends Model
{
    use LaboratoristAttribute;
    
    protected $table = 'laboratorist';

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
