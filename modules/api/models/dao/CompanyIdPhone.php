<?php

namespace app\modules\api\models\dao;


/**
 * Телефоны комании
 */
class CompanyIdPhone extends AbstractDao
{
    public function query()
    {
        $Filter = $this->getFilter();
        $query = (new \yii\db\Query())
            ->select([
                //'c.id as id_company',
                'p.number',
            ])->from('company c')
            ->innerJoin('phone p','c.id = p.id_company')
            ->andfilterWhere(['c.id' => $Filter->id_company]);
        
        return $query;
    }

}
