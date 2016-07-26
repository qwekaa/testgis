<?php

namespace app\modules\api\models\reports;

abstract class AbstractReport
{
    /**
     * Класс, содержащий фильтрующие данные
     * @var DataFilter 
     */
    private $DataFilter;


    public function __construct(DataFilter $DataFilter)
    {
        $this->DataFilter = $DataFilter;
    }
    
    protected function getFilter()
    {
        return $this->DataFilter;
    }
    
    abstract public function getData();
}