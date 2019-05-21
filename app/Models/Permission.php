<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Permission extends Authenticatable
{
    protected $table = 'permission';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name' ];

    public function group_permission()
    {
        return $this->hasMany('App\Models\GroupPermission');
    }

}
