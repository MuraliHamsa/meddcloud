<?php

namespace App\Models\Accountant;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accountant\Traits\AccountantAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accountant extends Model
{
    use AccountantAttribute;
    
    protected $table = 'accountant';

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
