<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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
            'role' => 1,
            'password' => Hash::make('admin@123'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 2,
            'password' => Hash::make('admin@123'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Processor',
            'last_name' => 'Processor',
            'email' => 'processor@gmail.com',
            'role' => 3,
            'password' => Hash::make('processor@123'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Agent',
            'last_name' => 'Agent',
            'email' => 'agent@gmail.com',
            'role' => 4,
            'password' => Hash::make('agent@123'),
        ]);
    }
}
