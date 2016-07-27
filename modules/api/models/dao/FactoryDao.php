<?php

namespace app\modules\api\models\dao;

use app\modules\api\models\filters\DataFilter;

class FactoryDao
{
    
    const COMPANYBUILD = 'combuild';
    
    const COMPANYRUBRICK = 'comrub';
    
    const COMPANYRADIUS = 'comrad';
    
    const COMPANYRECT = 'comrect';
    
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
            self::COMPANYRADIUS => 'CompanyRadius',
            self::COMPANYRECT => 'CompanyRect',
        ];
        if (!isset($mapDao[$report_id])) {
            throw new \Exception('Класс не найден');
        }
        $daoClass = 'app\\modules\\api\\models\\dao\\'.$mapDao[$report_id];
        $dao      = new $daoClass;
        $dao->setFilter($DataFilter);
        return $dao;
    }
}

