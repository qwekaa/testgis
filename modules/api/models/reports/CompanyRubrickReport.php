<?php

namespace app\modules\api\models\reports;

use app\modules\api\models\dao\CompanyRubrick;

class CompanyRubrickReport extends AbstractReport
{

    public function getData()
    {
        $dao  = new CompanyRubrick($this->getFilter());
        $data = $dao->getAllExec();
        return $data;
    }
}