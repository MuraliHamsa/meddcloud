<?php

namespace App\Models\Doctor;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor\Traits\DoctorAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use DoctorAttribute;
    
    protected $table = 'doctor';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['image', 'name', 'address', 'phone', 'department_id', 'email', 'user_id', 'hospital_id'];

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

    public function department()
    {
        return $this->belongsTo('App\Models\Department\Department')->withTrashed();
    }
}
