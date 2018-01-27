<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Model
{
    
    protected $table = 'settings';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['system_vendor', 'title', 'email', 'phone', 'address', 'currency', 'discount', 'hospital_id'];

    protected $dates = ['deleted_at'];

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }
}
