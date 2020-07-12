<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CityTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(TripTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(UtilityTableSeeder::class);
    }
}
