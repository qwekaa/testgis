<?php

namespace app\modules\api\models\reports;

/**
 * Отчет по организации и её данным: тел. номерам и рубрикам
 */
class CompanyIdReport extends AbstractReport
{
    public function getData()
    {
        $Company = $this->getDao();
        
        $res = $Company->getOneExec();
        if (!empty($res)){
            $Filter = $this->getFilter();
            $newFilter = clone $Filter;
            $newFilter->id_company    = $res['id_company'];
            $newFilter->title_company = '';
            
            $CompanyIdPhone   = new \app\modules\api\models\dao\CompanyIdPhone();//FactoryDao::getInstance('comidphone', $this->getFilter());
            $CompanyIdRubrick = new \app\modules\api\models\dao\CompanyIdRubrick();//FactoryDao::getInstance('comidrub', $this->getFilter());
            $CompanyIdPhone->setFilter($newFilter);
            $CompanyIdRubrick->setFilter($newFilter);
        
            $res['phones'] = $CompanyIdPhone->getAllExec();
            $res['rubrick'] = $CompanyIdRubrick->getAllExec();
        } else {
            $res = [];
        }
        
        return $res;
    }

}