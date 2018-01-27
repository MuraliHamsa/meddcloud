<?php

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Permission;

class GroupPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('group_permission')->delete();
        
        $group_permission = [
            'superadmin' => ['manage-hospital'],
            'admin' => ['manage-department', 'manage-doctor', 'manage-patient', 'manage-human-resource', 'manage-financial-activities', 'manage-medicine', 'manage-donor', 'manage-report', 'manage-setting', 'manage-bed'],
            'Accountant' => ['manage-patient'],
            'Doctor' => ['manage-patient', 'manage-medicine', 'manage-donor', 'manage-report', 'manage-setting', 'manage-bed'],
            'Nurse' => ['manage-patient'],
            'Laboratorist' => ['manage-patient', 'manage-donor', 'manage-setting'],
            'Receptionist' => ['manage-patient'],
            'Transcriptionist' => ['manage-patient', 'manage-donor']
        ];

        foreach($group_permission as $key => $value)
        {
            $group = Group::where('name', $key)->first();
            foreach($value as $val)
            {
                $permission = Permission::where('name', $val)->first();
                $data[] = [
                    'group_id' => $group->id,
                    'permission_id' => $permission->id
                ];
            }
        }

        DB::table('group_permission')->insert($data);
    }

}
