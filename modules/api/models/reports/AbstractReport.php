<?php

namespace app\modules\api\models\reports;

use app\modules\api\models\filters\DataFilter;

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
    
    /**
     * Функция возвращает данные и если нужно, то 
     * выполняет какие-л преобразования
     */
    abstract public function getData();
}