<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserGroup;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('user_groups')->delete();
    	DB::table('users')->delete();
    	
        $user = User::create([
        	'username' => 'Superadmin',
        	'email' => 'superadmin@meddcloud.com',
        	'password' => bcrypt(12345),
            'last_login' => Carbon::now(),
       		'active' => 1
        ]);
        UserGroup::create([
        	'user_id' => $user->id,
            'group_id' => 1
        ]);
    }

}
