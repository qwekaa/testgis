<?php

namespace app\modules\api\models\dao;

use app\modules\api\models\filters\DataFilter;

/**
 * Класс содержит метод для выборки данные.
 * Через фильтр можно будет отбирать только нужные данные
 * Наслуемы классы реализуют свой запрос в методе query
 * 
 */
abstract class AbstractDao
{
    
    /**
     * Класс, содержащий фильтрующие данные
     * @var DataFilter 
     */
    private $DataFilter;


    public function setFilter(DataFilter $DataFilter)
    {
        $this->DataFilter = $DataFilter;
    }


    protected function getFilter()
    {
        return $this->DataFilter;
    }


    /**
     * @return \yii\db\Query
     */
    abstract public function query();
    
    /**
     * 
     * @return array выбока из БД
     */
    public function getAllExec()
    {
        return $this->query()->all();
    }
    
    public function getOneExec()
    {
        return $this->query()->one();
    }

}

