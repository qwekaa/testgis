<?php

namespace app\modules\api\models\reports;

use app\modules\api\models\Tree;
use app\modules\api\models\dao\Rubricks;

/**
 * Формирует отчет организации по рубрикам с учетом вложенности рубрик
 */
class CompaniesRubrickReport extends AbstractReport
{
    public function getData()
    {
        $Companies = $this->getDao();
        $Filter    = $this->getFilter();
        $formatRubricks = $this->formatRubricks();
        
        $tree      = new Tree($formatRubricks);
        $tree->findChilds($Filter->rubrick);
        $childsRubricks = $tree->getVisited();
        $Filter->rubrick = $childsRubricks;
        
        $Companies->setFilter($Filter);
        $res = $Companies->getAllExec();
        return $res;
    }
    
    protected function getRubricks()
    {
        $RubricksDao = new Rubricks();
        $Rubricks = $RubricksDao->getAllExec();
        return $Rubricks;
    }
    
    protected function formatRubricks()
    {
        $rubricks = $this->getRubricks();
        $res = [];
        foreach ($rubricks as $v){
            $res[$v['parent_id']][] = (int)$v['id'];
        }
        return $res;
    }

}