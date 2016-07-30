<?php

namespace app\modules\api\models\dao;

use yii\db\Expression;

/**
 * Выбор команий в прямоугольной области
 */
class CompanyRect extends AbstractDao
{
    public function query()
    {
        $Filter = $this->getFilter();
        $query  = (new \yii\db\Query())
                ->select([
                    'c.title'
                ])
                ->from('building b')
                ->innerJoin('company c', 'b.id = c.id_building')
                ->where(new Expression('ABS(:latitude - b.latitude) < :half_x and ABS(:longitude - b.longitude) <= :half_y'))
                ->addParams([
                    ':latitude' => $Filter->latitude,
                    ':longitude' => $Filter->longitude,
                    ':half_x' => $Filter->x/2,
                    ':half_y' => $Filter->y/2,
                ])
                ->orderBy('c.title');
        return $query;
    }

}