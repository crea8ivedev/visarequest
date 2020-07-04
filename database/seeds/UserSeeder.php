<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Config;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('users')->insert([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'role' => Config::get('constants.roles.SUPERADMIN'),
            'password' => Hash::make('admin@123'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => Config::get('constants.roles.ADMIN'),
            'password' => Hash::make('admin@123'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Processor',
            'last_name' => 'Processor',
            'name' => 'Processor',
            'email' => 'processor@gmail.com',
            'role' => Config::get('constants.roles.PROCESSOR'),
            'password' => Hash::make('processor@123'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Agent',
            'last_name' => 'Agent',
            'name' => 'Agent',
            'email' => 'agent@gmail.com',
            'role' => Config::get('constants.roles.AGENT'),
            'password' => Hash::make('agent@123'),
        ]);
    }
}
