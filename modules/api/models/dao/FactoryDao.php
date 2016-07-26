<?php

namespace app\modules\api\models\dao;

use app\modules\api\models\filters\DataFilter;

class FactoryDao
{
    
    const COMPANYBUILD = 'combuild';
    
    const COMPANYRUBRICK = 'comrub';
    
    /**
     * 
     * @param string $report_id
     * @param DataFilter $DataFilter
     * @return AbstractDao
     * @throws \Exception
     */
    public static function getInstance($report_id,DataFilter $DataFilter)
    {
        $mapDao = [
            self::COMPANYBUILD => 'CompanyBuild',
            self::COMPANYRUBRICK => 'CompanyRubrick',
        ];
        if (!isset($mapDao[$report_id])) {
            throw new \Exception('The report have not found');
        }
        $daoClass = 'app\\modules\\api\\models\\dao\\'.$mapDao[$report_id];
        $dao      = new $daoClass;
        $dao->setFilter($DataFilter);
        return $dao;
    }
}

