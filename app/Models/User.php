<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserGroup;
use Carbon\Carbon;

class User extends Authenticatable
{
    protected $table = 'users';

    public $timestamps = true;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'ip_address', 'last_login', 'active', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public static function storeUser($data, $group_id)
    {
        if(!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $user = User::create([
            'username'      => $data['name'],
            'email'         => $data['email'],
            'password'      => $data['password'],
            'ip_address'    => $_SERVER['REMOTE_ADDR'],
            'last_login'    => Carbon::now(),
            'active'        => 1
        ]);
        if($user){
            if($group_id == 5) {
                if(empty($data['email'])) {
                    $user->email = str_replace(" ","",strtolower($user->username)).$user->id.'@meddcloud.com';
                }
                if(empty($data['password'])) {
                    $user->password = bcrypt(123456);
                }
                $user->save();
            }
            UserGroup::create([
                'user_id' => $user->id,
                'group_id' => $group_id
            ]);
        }
        return $user;
    }

    public static function updateUser($user_id, $data)
    {
        $user = User::findorfail($user_id);
        $user->username = $data['name'];
        $user->email = $data['email'];
        if(!empty($data['password'])) {
            $user->password = bcrypt($data['password']);
        }
        $user->save();
        return $user;
    }

    public function usergroup()
    {
        return $this->hasMany('App\Models\UserGroup');
    }

    public function group()
    {
        return $this->belongsToMany('App\Models\Group', 'user_groups');
    }
}
