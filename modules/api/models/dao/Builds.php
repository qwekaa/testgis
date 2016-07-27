<?php

namespace app\modules\api\models\dao;

/**
 * Класс реализует метод query абстрактного класса,
 * выбирая здания
 */
class Builds extends AbstractDao
{
    
    public function query()
    {
        $query = (new \yii\db\Query())
            ->select([
                'b.address'
            ])->from('building b')
            ->orderBy('b.address');
        return $query;
    }
}