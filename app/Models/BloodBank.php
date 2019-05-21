<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodBank extends Model
{
    protected $table = 'blood_bank';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = [ 'name', 'status' ];

    protected $dates = ['deleted_at'];
    
}
