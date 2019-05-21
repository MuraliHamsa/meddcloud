<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();
        
        $groups = ['superadmin'=>'Administrator', 'members'=>'General User', 'Accountant'=>'For Financial Activities', 'Doctor'=>'', 'Patient'=>'', 'Nurse'=>'', 'Pharmacist'=>'', 'Laboratorist'=>'', 'admin'=>'hospitals', 'Receptionist'=>'receptionist and account access', 'Transcriptionist'=>'medical transcriptionist'];

        foreach($groups as $key => $val){
        	$data[] = [
        		'name' => $key,
        		'description' => $val,
        		'active' => 1
        	];
        }

        DB::table('groups')->insert($data);
    }
}
