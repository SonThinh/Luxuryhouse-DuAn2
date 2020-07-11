<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('
        INSERT INTO sliders (id, types, image,link, created_at, updated_at) VALUES
        (1, \'DN\', \'{\"image_name\":\"DN.png\",\"image_path\":\"uploads\\/event\\/DN\\/DN.png\"}\', \'da.nnnn\', \'2020-06-17 01:09:09\', \'2020-06-17 01:09:09\'),
        (2, \'HCM\', \'{\"image_name\":\"HCM.png\",\"image_path\":\"uploads\\/event\\/HCM\\/HCM.png\"}\', \'hcm\', \'2020-06-17 01:09:21\', \'2020-06-17 01:09:21\'),
        (3, \'HN\', \'{\"image_name\":\"HN.png\",\"image_path\":\"uploads\\/event\\/HN\\/HN.png\"}\', \'hn.vvv\', \'2020-06-17 01:09:32\', \'2020-06-17 01:09:32\');
        ');
    }
}
