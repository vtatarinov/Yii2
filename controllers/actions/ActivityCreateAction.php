<?php


namespace app\controllers\actions;


use yii\base\Action;
use app\components\ActivityComponent;
use app\models\Activity;
use yii\bootstrap\ActiveForm;
use yii\web\Response;

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
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            if ($component->createActivity($model)) {
                return $this->controller->render('view', ['model' => $model]);
            }
        }
        return $this->controller->render('create', ['model' => $model]);
    }
}