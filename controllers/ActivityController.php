<?php


namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\ActivityCreateAction;
use app\models\Activity;
use yii\web\HttpException;

class ActivityController extends BaseController
{
    private function getRbac()
    {
        return \Yii::$app->rbac;
    }

    public function actions()
    {
        return [
            'create' => ['class' => ActivityCreateAction::class, 'rbac' => $this->getRbac()],
            'edit' => ['class' => ActivityCreateAction::class, 'rbac' => $this->getRbac()]
        ];
    }

    public function actionView($id)
    {
        /** @var Activity $model */
        $model = \Yii::$app->activity->getModel();
        $model = $model::find()->andWhere(['id' => $id])->one();

        if (!$this->getRbac()->canViewActivity($model)) {
            throw new HttpException(403, 'You do not have access to view activity');
        }

        return $this->render('view', ['model' => $model]);
    }
}