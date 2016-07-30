<?php

namespace app\modules\api\models\reports;

/**
 * Стандартный класс для получения класса отчет
 */
class Report extends AbstractReport
{
    public function getData()
    {
        $dao = $this->getDao();
        return $dao->getAllExec();
    }

}