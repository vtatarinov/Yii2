<?php


namespace app\controllers\actions;


use yii\base\Action;
use app\components\ActivityComponent;
use app\models\Activity;

class ActivityCreateAction extends Action
{
    public function run()
    {
        $model = \Yii::$app->activity->getModel();

        /**
         * @var ActivityComponent $component
         */

        $component = \Yii::createObject(['class' => ActivityComponent::class, 'activityClass' => Activity::class]);
        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if ($component->createActivity($model)) {

            }
        }
        return $this->controller->render('create', ['model'=>$model]);
    }
}