<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupsTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(GroupPermissionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BloodBankTableSeeder::class);
    }
}
