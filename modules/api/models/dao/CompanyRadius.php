<?php

namespace app\modules\api\models\dao;

use yii\db\Expression;

/**
 * Выбор команий в радиусе
 */
class CompanyRadius extends AbstractDao
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
                ->where(new Expression('SQRT(POW(ABS(:latitude - b.latitude), 2) + POW(ABS(:longitude - b.longitude), 2)) <= :radius'))
                ->addParams([
                    ':latitude' => $Filter->latitude,
                    ':longitude' => $Filter->longitude,
                    ':radius' => $Filter->radius,
                ])
                ->orderBy('c.title');
        return $query;
    }

}