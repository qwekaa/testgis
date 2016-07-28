<?php

namespace app\modules\api\models\dao;

use yii\db\Expression;

class CompanyIdRubrick extends AbstractDao
{
    public function query()
    {
        $Filter = $this->getFilter();
        $query = (new \yii\db\Query())
            ->select([
                //'c.id as id_company',
                'r.name as rubrick',
            ])->from('company c')
            ->innerJoin('companyrubrick rc','rc.id_company = c.id')
            ->innerJoin('rubrick r','r.id = rc.id_rubrick')
            ->andfilterWhere(['c.id' => $Filter->id_company]);
            
        return $query;
    }

}
