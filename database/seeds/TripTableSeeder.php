<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('
            INSERT INTO `trips` (`id`, `name`, `key`, `created_at`, `updated_at`) VALUES
            (1, \'Gia đình\', \'gd\', \'2020-06-13 06:27:35\', \'2020-06-13 06:27:35\'),
            (2, \'Cặp đôi\', \'cd\', \'2020-06-13 06:27:42\', \'2020-06-13 06:27:42\'),
            (3, \'Party\', \'pt\', \'2020-06-13 06:27:49\', \'2020-06-13 06:27:49\'),
            (4, \'Công việc\', \'cv\', \'2020-06-13 06:27:56\', \'2020-06-13 06:27:56\'),
            (5, \'Trải nghiệm cá nhân\', \'cn\', \'2020-06-13 06:28:02\', \'2020-06-13 06:28:02\');
        ');
    }
}
