<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserGroup extends Authenticatable
{
    protected $table = 'user_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'group_id'
    ];

    public static function getUserGroup($id)
    {
        return UserGroup::with(['group' => function($query){
            $query->addSelect(['id', 'name']);
        }])->where('user_id', $id)->first();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
    
}
