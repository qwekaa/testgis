<?php

namespace app\modules\api\controllers;

use yii\web\Controller;

use app\modules\api\models\filters\DataFilter;
use app\modules\api\models\reports\Report;
/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionV1($report_id)
    {
        $DataFilter = new DataFilter();
        $get = \Yii::$app->request->get();
        $result = [];
        if ($DataFilter->load($get,'') && $DataFilter->validate()){
            $Report = new Report($report_id, $DataFilter);
            $result = $Report->getData();
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $result;
    }
}
