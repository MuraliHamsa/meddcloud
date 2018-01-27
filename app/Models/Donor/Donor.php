<?php

namespace App\Models\Donor;

use Illuminate\Database\Eloquent\Model;
use App\Models\Donor\Traits\DonorAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donor extends Model
{
    use DonorAttribute;
    
    protected $table = 'donor';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['name', 'blood_bank_id', 'age', 'sex', 'last_donation', 'email', 'phone', 'hospital_id'];

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

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

}
