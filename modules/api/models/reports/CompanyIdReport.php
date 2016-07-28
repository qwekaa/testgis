<?php

namespace app\modules\api\models\reports;

use app\modules\api\models\dao\FactoryDao;

class CompanyIdReport extends AbstractReport
{
    public function getData()
    {
        $Company          = $this->getDao();//FactoryDao::getInstance($this->getReportId(), $this->getFilter());
        $CompanyIdPhone   = new \app\modules\api\models\dao\CompanyIdPhone();//FactoryDao::getInstance('comidphone', $this->getFilter());
        $CompanyIdRubrick = new \app\modules\api\models\dao\CompanyIdRubrick();//FactoryDao::getInstance('comidrub', $this->getFilter());
        $CompanyIdPhone->setFilter($this->getFilter());
        $CompanyIdRubrick->setFilter($this->getFilter());
        
        $res = $Company->getOneExec();
        if (!empty($res)){
            $res['phones'] = $CompanyIdPhone->getAllExec();
            $res['rubrick'] = $CompanyIdRubrick->getAllExec();
        } else {
            $res = [];
        }
        
        return $res;
    }

}