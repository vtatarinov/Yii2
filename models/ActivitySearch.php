<?php


namespace app\models;


use app\components\ActivityComponent;
use yii\data\ActiveDataProvider;

class ActivitySearch extends Activity
{
    public function getDataProvider($params)
    {
        $component = \Yii::createObject(['class' => ActivityComponent::class, 'activityClass' => Activity::class]);

        $model = $component->getModel();

        $query = $model::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ]
        ]);

        return $provider;
    }
}