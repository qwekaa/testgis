<?php

namespace app\modules\api\models\dao;

/**
 * Выбор всех рубрик
 */
class Rubricks extends AbstractDao
{
    public function query()
    {
        
        $query = (new \yii\db\Query())
            ->select([
                'r.id',
                'r.parent_id',
            ])->from('rubrick r');
        return $query;
    }
}