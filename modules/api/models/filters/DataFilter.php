<?php

namespace app\modules\api\models\filters;

class DataFilter extends \yii\base\Model
{
    public $build;
    
    public $rubrick;
    
    public $radius;
    
    public $latitude;
    
    public $longitude;
    
    public $x;
    
    public $y;


    public function rules()
    {
        return [
            [['build','rubrick'],'integer','min' => 0],
            [['radius','latitude','longitude'],'double'],
            [['radius','x','y'],'double'],
            [['latitude','longitude'], 'filter', 'filter' => 'floatval'],
            [['radius','x','y'], 'filter', 'filter' => 'floatval'],
        ];
    }
}