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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'password' => Hash::make('admin@123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Processor',
            'email' => 'processor@gmail.com',
            'role' => '2',
            'password' => Hash::make('processor@123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Agent',
            'email' => 'agent@gmail.com',
            'role' => '3',
            'password' => Hash::make('agent@123'),
        ]);
    }
}
