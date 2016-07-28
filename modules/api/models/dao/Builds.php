<?php

namespace app\modules\api\models\dao;

/**
 * Класс реализует метод query абстрактного класса,
 * выбирая здания
 */
class Builds extends AbstractDao
{
    //http://localhost/test/2gis/web/api/default/v1/?report_id=builds
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