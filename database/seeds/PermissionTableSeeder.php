<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_permission')->delete();
    	DB::table('permission')->delete();
        
        $permission = ['manage-hospital', 'manage-department', 'manage-doctor', 'manage-patient', 'manage-human-resource', 'manage-financial-activities', 'manage-medicine', 'manage-donor', 'manage-report', 'manage-setting', 'manage-bed'];

        foreach($permission as $val){
            $data[] = [
                'name' => $val
            ];
        }

        DB::table('permission')->insert($data);
    }

}
