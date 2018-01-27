<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Group extends Authenticatable
{
    protected $table = 'groups';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'active'
    ];

    public function usergroup()
    {
        return $this->hasMany('App\Models\UserGroup');
    }

    public function permission()
    {
        return $this->belongsToMany('App\Models\Permission', 'group_permission');
    }

}
