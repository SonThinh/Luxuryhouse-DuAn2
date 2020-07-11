<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('
        INSERT INTO utilities (id, key, symbol, icon, created_at, updated_at) VALUES
        (1, \'lvs\', \'Lò vi sóng\', \'far fa-microwave\', \'2020-06-13 06:31:23\', \'2020-06-13 06:31:23\'),
        (2, \'tl\', \'Tủ lạnh\', \'far fa-refrigerator\', \'2020-06-13 06:31:37\', \'2020-06-13 06:31:37\'),
        (3, \'tv\', \'Tivi\', \'fal fa-tv-alt\', \'2020-06-13 06:31:48\', \'2020-06-13 06:31:48\'),
        (4, \'ln\', \'Lò nướng\', \'fas fa-oven\', \'2020-06-13 06:32:11\', \'2020-06-13 06:32:11\'),
        (5, \'wf\', \'Wifi\', \'far fa-wifi\', \'2020-06-13 06:32:32\', \'2020-06-13 06:32:32\'),
        (6, \'dh\', \'Điều hòa\', \'fal fa-air-conditioner\', \'2020-06-13 06:32:56\', \'2020-06-13 06:32:56\'),
        (7, \'bt\', \'Bồn tắm\', \'fal fa-bath\', \'2020-06-13 06:33:12\', \'2020-06-13 06:33:12\'),
        (8, \'ga\', \'Garage\', \'fas fa-car-garage\', \'2020-06-13 06:35:41\', \'2020-06-13 06:35:41\'),
        (9, \'gy\', \'Phòng Gym\', \'far fa-dumbbell\', \'2020-06-13 06:37:35\', \'2020-06-13 06:37:35\'),
        (10, \'ct\', \'Cocktail\', \'fal fa-cocktail\', \'2020-06-13 06:40:06\', \'2020-06-13 06:40:06\'),
        (11, \'xh\', \'Xông hơi\', \'far fa-hot-tub\', \'2020-06-13 06:40:33\', \'2020-06-13 06:40:33\'),
        (12, \'cf\', \'Coffee\', \'far fa-coffee\', \'2020-06-13 06:40:58\', \'2020-06-13 06:40:58\'),
        (13, \'fd\', \'Đồ ăn\', \'far fa-concierge-bell\', \'2020-06-13 06:41:27\', \'2020-06-13 06:41:27\'),
        (14, \'sqa\', \'Sấy quần áo\', \'far fa-dryer\', \'2020-06-13 06:42:00\', \'2020-06-13 06:42:00\'),
        (15, \'ht\', \'Hút thuốc\', \'far fa-smoking\', \'2020-06-13 06:42:53\', \'2020-06-13 06:42:53\'),
        (16, \'cht\', \'Cấm hút thuốc\', \'far fa-smoking-ban\', \'2020-06-13 06:43:45\', \'2020-06-13 06:43:45\'),
        (17, \'mg\', \'Máy giặt\', \'far fa-washer\', \'2020-06-13 06:44:43\', \'2020-06-13 06:44:43\'),
        (18, \'kwf\', \'Không có Wifi\', \'fas fa-wifi-slash\', \'2020-06-13 06:45:06\', \'2020-06-13 06:45:06\'),
        (19, \'xl\', \'Có chỗ cho xe lăn\', \'far fa-wheelchair\', \'2020-06-13 06:45:27\', \'2020-06-13 06:45:27\'),
        (20, \'kt\', \'Khăn tắm\', \'fal fa-blanket\', \'2020-06-13 06:46:26\', \'2020-06-13 06:46:26\'),
        (21, \'tc\', \'Cho phép thú cưng\', \'far fa-paw-alt\', \'2020-06-13 06:50:55\', \'2020-06-13 06:50:55\');
        ');
    }
}
