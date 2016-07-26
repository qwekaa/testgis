<?php

namespace app\modules\api\controllers;

use app\modules\api\models\reports\Report;
use app\modules\api\models\filters\DataFilter;

class RestController extends \yii\rest\Controller
{
    public function actionCompanybuid($build)
    {
        $DataFilter              = new DataFilter();
        $DataFilter->id_building = $build;
        
        $Report = new CompanyBuildReport($DataFilter);
        return $Report->getData();
    }
    
    public function actionCompanyrubrick($rubrick)
    {
        $DataFilter             = new DataFilter();
        $DataFilter->id_rubrick = $rubrick;
        
        $Report = new CompanyRubrickReport($DataFilter);
        return $Report->getData();
    }
    
    public function actionV1($report_id)
    {

    }
}