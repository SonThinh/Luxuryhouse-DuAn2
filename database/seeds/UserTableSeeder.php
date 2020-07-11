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
    }
}
