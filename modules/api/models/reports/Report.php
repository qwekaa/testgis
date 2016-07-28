<?php

namespace app\modules\api\models\reports;

use app\modules\api\models\dao\FactoryDao;

class Report extends AbstractReport
{

    public function getData()
    {
        $dao = $this->getDao();//FactoryDao::getInstance($this->getReportId(), $this->getFilter());
        return $dao->getAllExec();
    }

}