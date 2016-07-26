<?php

namespace app\modules\api\models\dao;

/**
 * Класс реализует метод query абстрактного класса,
 * выбирая организации, находящиеся в указанном зданиии
 */
class CompanyBuild extends AbstractDao
{
    
    public function query()
    {
        $Filter = $this->getFilter();
        $query = (new \yii\db\Query())
            ->select([
                'c.title'
            ])->from('build b')
            ->innerJoin('company c','b.id = c.id_building')
            ->where('b.id = :id_building',[':id_building' => $Filter->id_building])
            ->orderBy('c.name');
        return $query;
    }
}