<?php

namespace app\modules\api\models\dao;

use yii\db\Expression;

class CompanyRadius extends AbstractDao
{
    //http://localhost/test/2gis/web/api/default/v1/?report_id=comrad&radius=0.01&latitude=82.78&longitude=54.78
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