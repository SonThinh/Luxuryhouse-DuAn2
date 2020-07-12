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
        INSERT INTO sliders (id, types, image, link, created_at, updated_at) VALUES
        (1, \'DN\', \'{\"image_name\":\"1.png\",\"image_path\":\"uploads\\/event\\/1\\/1.png\"}\', \'dn.vvv\', \'2020-07-12 03:27:28\', \'2020-07-12 03:27:28\'),
        (2, \'HCMC\', \'{\"image_name\":\"2.png\",\"image_path\":\"uploads\\/event\\/2\\/2.png\"}\', \'hcmc.vvv\', \'2020-07-12 03:27:40\', \'2020-07-12 03:27:40\'),
        (3, \'HN\', \'{\"image_name\":\"3.png\",\"image_path\":\"uploads\\/event\\/3\\/3.png\"}\', \'hn.vvv\', \'2020-07-12 03:27:53\', \'2020-07-12 03:27:53\');
        ');
    }
}
