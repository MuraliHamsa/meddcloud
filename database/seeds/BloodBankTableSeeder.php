<?php

use Illuminate\Database\Seeder;

class BloodBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_bank')->delete();
        
        $bloodbank = ['A+'=>'100 Bags', 'A-'=>'100 Bags', 'B+'=>'50 Bags', 'B-'=>'50 Bags', 'AB+'=>'10 Bags', 'AB-'=>'100 Bags', 'O+'=>'100 Bags', 'O-'=>'100 Bags', 'NA'=>'0 Bags'];

        foreach($bloodbank as $key => $val){
        	$data[] = [
        		'name' => $key,
        		'status' => $val
        	];
        }

        DB::table('blood_bank')->insert($data);
    }
}
