<?php

namespace app\modules\api\models\dao;

use yii\db\Expression;

class CompanyRect extends AbstractDao
{
    //http://localhost/test/2gis/web/api/default/v1/?report_id=comrect&x=0.02&y=0.02&latitude=82.78&longitude=54.78
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