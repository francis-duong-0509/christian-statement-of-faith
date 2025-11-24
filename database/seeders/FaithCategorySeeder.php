<?php

namespace Database\Seeders;

use App\Models\FaithCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaithCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name_vi' => 'Ba Ngôi Thiên Chúa',
                'name_en' => 'The Trinity',
                'slug_vi' => 'ba-ngoi-thien-chua',
                'slug_en' => 'the-trinity',
                'description_vi' => 'Chúng ta tin vào một Đức Chúa Trời duy nhất, tồn
   tại đời đời trong ba ngôi: Cha, Con và Thánh Linh.',
                'description_en' => 'We believe in one God, eternally existing in
  three persons: Father, Son, and Holy Spirit.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name_vi' => 'Kinh Thánh Thánh',
                'name_en' => 'Holy Scripture',
                'slug_vi' => 'kinh-thanh-thanh',
                'slug_en' => 'holy-scripture',
                'description_vi' => 'Chúng ta tin Kinh Thánh là Lời Chúa được thần
  cảm, không sai lầm, và là thẩm quyền cuối cùng trong mọi vấn đề đức tin và đời
  sống.',
                'description_en' => 'We believe the Bible is the inspired Word of
  God, inerrant, and the final authority in all matters of faith and practice.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name_vi' => 'Sự Cứu Rỗi',
                'name_en' => 'Salvation',
                'slug_vi' => 'su-cuu-roi',
                'slug_en' => 'salvation',
                'description_vi' => 'Chúng ta tin rằng sự cứu rỗi là ân điển của Đức
  Chúa Trời, được nhận bởi đức tin nơi Chúa Giê-xu Christ.',
                'description_en' => 'We believe that salvation is the grace of God,
  received by faith in Jesus Christ alone.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name_vi' => 'Hội Thánh',
                'name_en' => 'The Church',
                'slug_vi' => 'hoi-thanh',
                'slug_en' => 'the-church',
                'description_vi' => 'Chúng ta tin Hội Thánh là thân thể của Đấng
  Christ, bao gồm tất cả những người tin Chúa.',
                'description_en' => 'We believe the Church is the body of Christ,
  composed of all believers in Jesus Christ.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name_vi' => 'Ngày Sau Rốt',
                'name_en' => 'Last Things',
                'slug_vi' => 'ngay-sau-rot',
                'slug_en' => 'last-things',
                'description_vi' => 'Chúng ta tin vào sự tái l림 của Chúa Giê-xu, sự
  phục sinh của người chết, và cuộc sống đời đời.',
                'description_en' => 'We believe in the second coming of Jesus Christ,
   the resurrection of the dead, and eternal life.',
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            FaithCategory::create($category);
        }
    }
}
