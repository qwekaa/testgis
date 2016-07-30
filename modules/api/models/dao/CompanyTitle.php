<?php

namespace app\modules\api\models\dao;

/*
 * Выборка компаний по id или названию команиии
 */
class CompanyTitle extends AbstractDao
{
    public function query()
    {
        $Filter = $this->getFilter();
        $query = (new \yii\db\Query())
            ->select([
                'c.id as id_company',
                'c.title',
                'b.address',
            ])->from('company c')
            ->innerJoin('building b','b.id = c.id_building')
            ->where(['like', 'c.title', $Filter->title_company]);
            
            
        return $query;
    }

}
