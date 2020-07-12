<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('
        INSERT INTO cities (id, name, image, description, created_at, updated_at) VALUES
        (1, \'Đà Lạt\', \'{\"image_name\":\"1.png\",\"image_path\":\"uploads\\/city\\/1\\/1.png\"}\', \'Vì Đà Lạt đẹp nên nó phải...buồn. Mà cũng vì nó buồn nên nó càng đẹp. Đấy là cái đẹp không trộn lẫn với bất cứ thành phố nào ở đất nước này. Rong ruổi trên những con phố uốn quanh trong một chiều mưa bay nhè nhẹ, tôi thầm nghĩ, nếu đến với Đà Lạt từ trước hay lưu lại đây lâu hơn nữa, có lẽ tôi đã muốn trở thành một thi sĩ, nhà văn hay đại khái là một kẻ mộng mơ ôm một bầu tâm trạng rồi đấy\', \'2020-07-12 03:20:17\', \'2020-07-12 03:20:17\'),
        (2, \'Đà Nẵng\', \'{\"image_name\":\"2.png\",\"image_path\":\"uploads\\/city\\/2\\/2.png\"}\', \'Đà Nẵng được mệnh danh là thành phố đáng sống nhất Việt Nam. Và cảnh đẹp Đà nẵng luôn hấp dẫn du khách bốn phương bởi những bờ biển dài duyên dáng, cảnh sắc núi non xanh mượt, nền ẩm thực phong phú và nhiều địa điểm vui chơi giải trí thú vị bậc nhất.\', \'2020-07-12 03:20:45\', \'2020-07-12 03:20:45\'),
        (3, \'Hồ Chí Minh\', \'{\"image_name\":\"3.png\",\"image_path\":\"uploads\\/city\\/3\\/3.png\"}\', \'Du lịch đến với Sài Gòn – TP.HCM hơn 300 năm tuổi, bạn có thể gặp những tòa nhà cao tầng nằm san sát, những khu vui chơi giải trí, trung tâm mua sắm sầm uất, nhưng cũng không thiếu những biệt thự cổ kính, những ngôi chợ truyền thống tồn tại đã hàng trăm năm. Sài Gòn rộng lớn và không thiếu những “đặc sản” du lịch như Du ngoạn ven sông Sài Gòn bằng tàu, thăm phố Tây Phạm Ngũ Lão, mua sắm ở chợ Bến Thành hay về với biển Cần Giờ….\', \'2020-07-12 03:21:11\', \'2020-07-12 03:21:11\'),
        (4, \'Hạ Long\', \'{\"image_name\":\"4.png\",\"image_path\":\"uploads\\/city\\/4\\/4.png\"}\', \'Có một Hạ Long như thế, đẹp đến \\\"nghẹt thở\\\" và để đến khi đứng trước Hạ Long, các tao nhân mặc khách, các nhà chính khách… trong nước và quốc tế đã không ít lời ca ngợi về cảnh đẹp của Di sản – Kỳ quan thiên nhiên thế giới này\', \'2020-07-12 03:21:39\', \'2020-07-12 03:21:39\'),
        (5, \'Hà Nội\', \'{\"image_name\":\"5.png\",\"image_path\":\"uploads\\/city\\/5\\/5.png\"}\', \'Mỗi địa danh đều mang trong mình một vẻ đẹp riêng vốn có, và mỗi người yêu một nơi mà họ đi qua theo cách của riêng mình. Nếu Sài Gòn đẹp với nhịp sống hối hả của những người trẻ thì Hà Nội gây thiện cảm với những buổi sớm bình yên, dung dị.\\\"Thức dậy thật sớm, đạp xe lòng vòng qua những phố phường, ghé quán trà đá vỉa hè nghe đôi ba câu chuyện cuộc sống cũng là một cách để cảm nhận vẻ đẹp thơ mộng của Hà Nội\', \'2020-07-12 03:22:05\', \'2020-07-12 03:22:05\'),
        (6, \'Hội An\', \'{\"image_name\":\"6.png\",\"image_path\":\"uploads\\/city\\/6\\/6.png\"}\', \'Phố cổ Hội An là một thành phố nổi tiếng của tỉnh Quảng Nam, một phố cổ giữ được gần như nguyên vẹn với hơn 1000 di tích kiến trúc từ phố xá, nhà cửa, hội quán, đình, chùa, miếu, nhà thờ tộc, giếng cổ… đến các món ăn truyền thống, tâm hồn của người dân nơi đây. Một lần du lịch Hội An sẽ làm say đắm lòng du khách bởi những nét đẹp trường tồn cùng thời gian, vô cùng mộc mạc, bình dị\', \'2020-07-12 03:22:34\', \'2020-07-12 03:22:34\'),
        (7, \'Huế\', \'{\"image_name\":\"7.png\",\"image_path\":\"uploads\\/city\\/7\\/7.png\"}\', \'Từng là Kinh đô của triều đại nhà Nguyễn, chính vì thế mà Huế được xem là một trong những thành phố có bề dày lịch sử, văn hóa lâu đời nhất ở nước ta. Không chỉ là văn hóa di tích mà Huế còn quyến rũ du khách bởi những cảnh quan thiên nhiên hữu tình thi vị và con người chân chất hiền hòa.\', \'2020-07-12 03:22:57\', \'2020-07-12 03:22:58\'),
        (8, \'Nha Trang\', \'{\"image_name\":\"8.png\",\"image_path\":\"uploads\\/city\\/8\\/8.png\"}\', \'Những ai đã từng có dịp đặt chân đến phố biển Nha Trang đắm mình trong làn nước biển xanh ngắt, nằm dài trên bờ cát phẳng mịn ngắm cảnh mây trời hay đón những khoảnh khắc thiên nhiên đẹp diệu kỳ thì hẳn sẽ không thể nào quên được mảnh đất xinh đẹp này. Qua bao năm tháng, phố biển Nha Trang ngày càng thay da đổi thịt, hòa cùng nhịp sống trẻ trung, hiện đại và năng động, đổi mới và phát triển từng ngày. Thế nhưng, vẻ đẹp của biển Nha Trang vẫn luôn khiến bao người mê mẩn và say đắm. Cứ thế, Nha Trang vẫn luôn là điểm hẹn du lịch biển tuyệt vời trong lòng những người lữ khách phương xa!\', \'2020-07-12 03:23:45\', \'2020-07-12 03:23:45\'),
        (9, \'Phú Quốc\', \'{\"image_name\":\"9.png\",\"image_path\":\"uploads\\/city\\/9\\/9.png\"}\', \'Đảo ngọc Phú Quốc tuy nhỏ nhưng quả thật là “rất có võ” luôn. Vô vàn cảnh đẹp Phú Quốc vẫn còn đang chờ bạn đến khám phá đấy\', \'2020-07-12 03:24:09\', \'2020-07-12 03:24:09\'),
        (10, \'Phan Thiết\', \'{\"image_name\":\"10.png\",\"image_path\":\"uploads\\/city\\/10\\/10.png\"}\', \'Phan Thiết có lẽ là điểm đến quá quen thuộc với du khách trong và ngoài nước. Nằm ở vị trí tuyệt vời của tỉnh Bình Thuận, sở hữu những khu nghỉ dưỡng và dịch vụ cao cấp hàng đầu Việt Nam, và đến Phan Thiết, không ai có thể bỏ qua những cảnh quan tuyệt đẹp để tận hưởng, ngắm nhìn và lưu giữ những khoảnh khắc thiên nhiên ấy\', \'2020-07-12 03:24:29\', \'2020-07-12 03:24:29\'),
        (11, \'SaPa\', \'{\"image_name\":\"11.png\",\"image_path\":\"uploads\\/city\\/11\\/11.png\"}\', \'Cảnh đẹp ở Sapa Lào Cai hùng vĩ, tráng lệ đến ngây ngất luôn thu hút đông đảo khách du lịch khám phá mỗi năm. Nơi đây sở hữu vô số địa điểm du lịch mà dù ghé thăm Sapa vào mùa nào, bạn cũng đều cảm thấy hấp dẫn đến lạ kì.\', \'2020-07-12 03:24:53\', \'2020-07-12 03:24:53\'),
        (12, \'Vũng Tàu\', \'{\"image_name\":\"12.png\",\"image_path\":\"uploads\\/city\\/12\\/12.png\"}\', \'Vũng Tàu từ lâu đã được xem là một điểm đến du lịch hấp dẫn, bởi những vẻ đẹp tự nhiên của mình. Dù đến bất cứ đâu trong chuyến du lịch Vũng Tàu, du khách cũng sẽ bị cuốn hút bởi phong cảnh của nơi đây\', \'2020-07-12 03:25:11\', \'2020-07-12 03:25:11\');
        ');
    }
}
