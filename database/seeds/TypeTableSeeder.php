<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('
        INSERT INTO types (id, key, name, created_at, updated_at) VALUES
        (1, \'ks\', \'Khách sạn\', \'2020-06-13 06:20:34\', \'2020-06-13 06:21:31\'),
        (2, \'cc\', \'Chung cư\', \'2020-06-13 06:23:59\', \'2020-06-13 06:23:59\'),
        (3, \'dv\', \'Căn hộ dịch vụ\', \'2020-06-13 06:24:14\', \'2020-06-13 06:24:14\'),
        (4, \'rs\', \'Resort\', \'2020-06-13 06:24:24\', \'2020-06-13 06:24:24\'),
        (5, \'nn\', \'Nhà nghỉ\', \'2020-06-13 06:24:38\', \'2020-06-13 06:24:38\'),
        (6, \'hs\', \'Homestay\', \'2020-06-13 06:25:14\', \'2020-06-13 06:25:14\'),
        (7, \'bt\', \'Biệt thự\', \'2020-06-13 06:25:16\', \'2020-06-13 06:25:16\'),
        (8, \'tent\', \'Lều\', \'2020-06-13 06:25:49\', \'2020-06-13 06:25:49\'),
        (9, \'nr\', \'Nhà riêng\', \'2020-06-13 06:26:53\', \'2020-06-13 06:26:53\');
        ');
    }
}
