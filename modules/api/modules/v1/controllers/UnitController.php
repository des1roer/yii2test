<?php

namespace app\modules\api\modules\v1\controllers;

use app\models\Unit;
use yii\rest\ActiveController;

class UnitController extends ActiveController
{
    public $allowedActions = ['index', 'view', 'update', 'create', 'delete'];

    public $modelClass = Unit::class;
}
