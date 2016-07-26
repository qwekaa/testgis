<?php

namespace app\modules\api\controllers;

use app\modules\api\models\reports\CompanyBuildReport;
use app\modules\api\models\filters\DataFilter;

class RestController extends \yii\rest\Controller
{
    public function actionCompany($build)
    {
        $DataFilter              = new DataFilter();
        $DataFilter->id_building = $build;
        $CompanyBuildReport      = new CompanyBuildReport($DataFilter);
        return $CompanyBuildReport->getData();
    }
}