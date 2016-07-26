<?php

namespace app\modules\api\models\reports;

use app\modules\api\models\dao\CompanyBuild;

class CompanyBuildReport extends AbstractReport
{

    public function getData()
    {
        $dao  = new CompanyBuild($this->getFilter());
        $data = $dao->getAllExec();
        return $data;
    }
}