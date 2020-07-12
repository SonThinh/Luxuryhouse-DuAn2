<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 0,
            'phone' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'email' => 'pst269@gmail.com',
            'password' => Hash::make('123456789aA'),
            'level' => 1,
            'phone' => '0902897645',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'email' => 'nguyentienbinh2408@gmail.com',
            'password' => Hash::make('123456789aA'),
            'level' => 1,
            'phone' => '0971059736',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
