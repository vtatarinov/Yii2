<?php


namespace app\controllers;


use app\base\BaseController;
use app\behaviors\DateCreatedBehavior;
use app\components\ActivityComponent;
use app\controllers\actions\ActivityCreateAction;
use app\models\Activity;
use app\models\ActivitySearch;
use yii\db\ActiveRecord;
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

    public function actionIndex()
    {
        $component = \Yii::createObject(['class' => ActivityComponent::class, 'activityClass' => Activity::class]);
        $activities = $component->getAllActivities();

        $model = new ActivitySearch();
        $provider = $model->getDataProvider(\Yii::$app->request->queryParams);

        if (!$this->getRbac()->canViewActivity($model)) {
            throw new HttpException(403, 'You do not have access to view activities');
        }

        return $this->render('index', ['activities' => $activities, 'model' => $model, 'provider' => $provider]);
    }

    public function actionView($id)
    {
        /** @var ActiveRecord $model */
        $model = \Yii::$app->activity->getModel();
        $model = $model::find()->andWhere(['id' => $id])->one();

        if (!$this->getRbac()->canViewActivity($model)) {
            throw new HttpException(403, 'You do not have access to view activity');
        }

//        $model->attachBehavior('dateCreated', [
//            'class' => DateCreatedBehavior::class, 'attributeName' => 'dateCreated'
//        ]);

//        $model->$this->detachBehavior('dateCreated');

        return $this->render('view', ['model' => $model]);
    }
}