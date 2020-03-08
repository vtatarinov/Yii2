<?php


namespace app\controllers;


use app\models\Activity;
use app\models\Users;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class RestController extends ActiveController
{
    public $modelClass = Activity::class;

    public function behaviors()
    {
        return array_merge([
            ['class' => HttpBearerAuth::class]
        ], parent::behaviors());
    }
}