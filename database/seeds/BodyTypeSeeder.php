<?php

use Illuminate\Database\Seeder;
use App\Models\BodyTypes;
class BodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $items = [

            ['body_type' => 'Фургон', 'type' => 'truck',],
            ['body_type' => '"Jumbo" Полуприцеп', 'type' => 'truck',],
            ['body_type' => 'Тентованный полуприцеп (еврофура)', 'type' => 'truck',],
            ['body_type' => '"Jumbo" Полуприцеп', 'type' => 'truck',],
            ['body_type' => 'Открытая платформа', 'type' => 'truck',],
            ['body_type' => 'Автосцепка', 'type' => 'truck',],
            ['body_type' => 'Рефрижераторный фургон', 'type' => 'truck',],
            ['body_type' => 'Контейнеровоз', 'type' => 'truck',],
            ['body_type' => 'Открытый бортовой полуприцеп', 'type' => 'truck',],
            ['body_type' => 'Хэтчбек', 'type' => 'car',],
            ['body_type' => 'Седан', 'type' => 'car',],
            ['body_type' => 'Кабриолет', 'type' => 'car',],
            ['body_type' => 'Универсал', 'type' => 'car',],
            ['body_type' => 'Кроссовер', 'type' => 'car',],
            ['body_type' => 'Минивен', 'type' => 'car',],

        ];

        foreach ($items as $item) {
            BodyTypes::insert([
                'body_type' => $item['body_type'],
                'type' => $item['type'],
            ]);
        }
    }
}
