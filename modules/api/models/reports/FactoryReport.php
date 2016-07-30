<?php

namespace app\modules\api\models\reports;

/**
 * Класс фабрика, возващающий нужный отчет по запросу.
 */
class FactoryReport
{
    
    const COMPANYBUILD = 'combuild';
    
    const COMPANYRUBRICK = 'comrub';
    
    const COMPANYRADIUS = 'comrad';
    
    const COMPANYRECT = 'comrect';
    
    const BUILDS = 'builds';
    
    const COMPANY = 'comid';
    
    const COMPANYTITLE = 'comtitle';
    
    const COMPANIESRUBRICK = 'comsrub';

    
    protected static $report_id;
    
    protected static $DataFilter;


    /**
     * Статический метод для создания класса отчета
     * @param string $report_id
     * @param DataFilter $DataFilter
     * @return \app\modules\api\models\reports\AbstractReport
     */
    public static function create($report_id,$DataFilter)
    {

        /**
         * @var $dao \app\modules\api\models\dao\AbstractDao 
         */
        
        self::$report_id  = $report_id;
        self::$DataFilter = $DataFilter;
        
        $reportClass = 'Report';
        $mapClass = self::map();
        $nsReportClass = 'app\\modules\\api\\models\\reports\\';

        if (isset($mapClass[$report_id]['report'])){
            $reportClass = $mapClass[$report_id]['report'];
        }

        $fullDao    = self::getDaoClass();//$nsDaoClass.$daoClass;
        $fullReport = $nsReportClass.$reportClass;
        $dao = new $fullDao;
        $dao->setFilter($DataFilter);
        
        $report = new $fullReport;
        $report->setDao($dao);
        $report->setFilter($DataFilter);
        return $report;
    }
    
    protected static function map()
    {
        return [
            self::COMPANYBUILD => ['dao' => 'CompanyBuild'],
            self::COMPANYRUBRICK => ['dao' => 'CompaniesRubrick'],
            self::COMPANYRADIUS => ['dao' => 'CompanyRadius'],
            self::COMPANYRECT => ['dao' => 'CompanyRect'],
            self::BUILDS => ['dao' => 'Builds'],
            self::COMPANY => ['dao' => 'CompanyId',
                'report' => 'CompanyIdReport'],
            self::COMPANYTITLE => ['dao' => 'CompanyTitle'],
            self::COMPANIESRUBRICK => ['dao' => 'CompaniesRubrick',
                'report' => 'CompaniesRubrickReport',
            ],
        ];
    }
    
    protected static function getDaoClass()
    {
        $mapClass   = self::map();
        $nsDaoClass = 'app\\modules\\api\\models\\dao\\';
        $daoClass   = $mapClass[self::$report_id]['dao'];
        return $nsDaoClass.$daoClass;
    }

}