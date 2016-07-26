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
    
    private $report_id;


    public function __construct($report_id,DataFilter $DataFilter)
    {
        $this->DataFilter = $DataFilter;
        $this->report_id = $report_id;
    }
    
    protected function getFilter()
    {
        return $this->DataFilter;
    }
    
    protected function getReportId()
    {
        return $this->report_id;
    }
    
    /**
     * Функция возвращает данные и если нужно, то 
     * выполняет какие-л преобразования
     */
    abstract public function getData();
}