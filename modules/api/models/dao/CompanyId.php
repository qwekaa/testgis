<?php

namespace app\modules\api\models\dao;

class CompanyId extends AbstractDao
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
            ->andfilterWhere(['c.id' => $Filter->id_company])
            ->andFilterWhere(['like', 'c.title', $Filter->title_company]);
            
            
        return $query;
    }

}
