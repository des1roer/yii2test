<?php

namespace app\modules\api\modules\v1\controllers;

use app\models\Unit;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class UnitController extends ActiveController
{
    public $allowedActions = ['index', 'view', 'update', 'create', 'delete'];

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors = ArrayHelper::merge(
            $behaviors,
            [
                'corsFilter' => [
                    'class' => \yii\filters\Cors::className(),
                    'cors' => [
                        'Origin' => ['*'],
                        'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
                        'Access-Control-Request-Headers' => ['X-Wsse'],
                        'Access-Control-Allow-Credentials' => true,
                    ],
                ],
                'contentNegotiator' => [
                    'formats' => [
                        // небольшой хак который позволяет IE получать данные в формате XML
                        'application/xaml+xml' => Response::FORMAT_XML,
                        'application/xhtml+xml' => Response::FORMAT_XML,
                    ],
                ],
                'httpCache' => [
                    'enabled' => YII_DEBUG,
                    'class' => 'yii\filters\HttpCache',
                    'only' => ['index', 'view'],
                ],
//                'access' => [
//                    'class' => AccessControl::className(),
//                    'rules' => [
//                        [
//                            'actions' => ['*'],
//                            'allow' => true,
//                            'roles' => ['*'],
//                        ]
//                    ],
//                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        '*' => ['post','get'],
                    ],
                ],
            ]
        );

        return $behaviors;
    }

    public $modelClass = Unit::class;
}
