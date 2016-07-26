<?php

namespace app\modules\api\models\dao;

class CompanyRubrick extends AbstractDao
{
    public function query()
    {
        $Filter = $this->getFilter();
        $query = (new \yii\db\Query())
            ->select([
                'c.title'
            ])->from('company c')
            ->innerJoin('companyrubrick cr','c.id = cr.id_company')
            ->innerJoin('rubrick r','r.id = cr.id_rubrick')
            ->where('r.id = :id_rubrick',[':id_rubrick' => $Filter->rubrick])
            ->orderBy('c.title');
        return $query;
    }
}