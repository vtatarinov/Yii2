<?php


namespace app\controllers\actions;


use yii\base\Action;

class DayIndexAction extends Action
{

    public function run()
    {
        $model = \Yii::$app->day->getModel();

        return $this->controller->render('index', ['model'=>$model]);
    }
}