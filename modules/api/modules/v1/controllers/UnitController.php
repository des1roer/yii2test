<?php

namespace app\modules\api\modules\v1\controllers;

use app\models\Unit;
use yii\rest\ActiveController;
use yii\filters\VerbFilter;

class UnitController extends ActiveController
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    '*' => ['POST','GET'],
                ],
            ],
        ];
    }

    public $modelClass = Unit::class;
}
