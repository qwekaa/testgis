<?php

use yii\db\Migration;

class m160725_144638_data extends Migration
{

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $build = [];
        $faker = Faker\Factory::create('ru_RU');

        for($i=0;$i<=1000;$i++){
            $build[$i]['address'] = $faker->address.' - '.$faker->randomDigitNotNull;
            $build[$i]['latitude'] = $faker->randomFloat(7,82.7,82.9);
            $build[$i]['longitude'] = $faker->randomFloat(7,54.7,54.9);
        }
        
        $this->batchInsert('building', [
            'address',
            'latitude',
            'longitude',
        ], $build);
        
        $companies = [];
        mt_srand();
        for($i=0;$i<=10000;$i++){
            $companies[$i]['title'] = $faker->company.' - '.$faker->randomDigitNotNull;
            $companies[$i]['id_building'] = mt_rand(1,1000);
        }
        $this->batchInsert('company', [
            'title',
            'id_building'
        ], $companies);
        
        $phones = [];
        for($i=0;$i<=20000;$i++){
            $phones[$i]['id_company'] = mt_rand(1,10000);
            $phones[$i]['number'] = $faker->phoneNumber;
        }
        $this->batchInsert('phone', ['id_company','number'], $phones);
        
        $rubricks = [
            [1,'Еда',0],
            [2,'Полуфабрикаты оптом',1],
            [3,'Мясная продукция',1],
            [4,'Автомобили',0],
            [5,'Грузовые',4],
            [6,'Легковые',4],
            [7,'Запчасти для подвески',6],
            [8,'Шины/Диски',6],
            [9,'Спорт',0],
            [10,'Бассейны',9],
            [11,'Стадионы',9],
            [12,'Лыжные базы',9], 
        ];
        $this->batchInsert('rubrick',['id', 'name','parent_id'],$rubricks);
        
        $companyrubrick = [];
        $exist = [];
        for($i=0;$i<20000;$i++){
            $id_c = mt_rand(1, 20000);
            $id_r = mt_rand(1, 12);
            $str = (string)($id_c.$id_r);
            if (!in_array($str, $exist) ){
                $exist[] = $str;
                $companyrubrick[$i]['id_company'] = $id_c;
                $companyrubrick[$i]['id_rubrick'] = $id_r;
            }
        }
        $this->batchInsert('companyrubrick', ['id_company','id_rubrick'], 
                $companyrubrick);
        
    }

    public function safeDown()
    {
    }
}
