<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient\Traits\PatientAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use PatientAttribute;
    
    protected $table = 'patient';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['id', 'doctor_id', 'ref_doctor_id', 'name', 'email', 'age', 'phone', 'address', 'birthdate', 'visit', 'sex', 'blood_bank_id', 'image', 'user_id', 'patientId', 'hospital_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public function blood_bank()
    {
        return $this->belongsTo('App\Models\BloodBank')->withTrashed();
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor\Doctor')->withTrashed();
    }

    public function ref_doctor()
    {
        return $this->belongsTo('App\Models\Doctor\Doctor', 'ref_doctor_id', 'id')->withTrashed();
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

    public function payment()
    {
        return $this->hasMany('App\Models\Payment\Payment');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
