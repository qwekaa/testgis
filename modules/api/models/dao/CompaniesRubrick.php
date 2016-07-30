<?php

namespace app\modules\api\models\dao;

/**
 * Выбирает компании по указанным рубрикам
 */
class CompaniesRubrick extends AbstractDao
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
            ->where(['in','r.id',$Filter->rubrick])
            ->orderBy('c.title');
        return $query;
    }

}