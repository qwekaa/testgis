<?php

namespace app\modules\api\models\filters;

class DataFilter extends \yii\base\Model
{
    public $build;
    
    public $rubrick;
    
    public function rules()
    {
        return [
            [['build','rubrick'],'integer','min' => 0],
        ];
    }
}