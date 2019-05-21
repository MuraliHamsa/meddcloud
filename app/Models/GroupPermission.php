<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class GroupPermission extends Authenticatable
{
    protected $table = 'group_permission';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'group_id', 'permission_id' ];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function permission()
    {
        return $this->belongsTo('App\Models\Permission');
    }

}
