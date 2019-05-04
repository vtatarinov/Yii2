<?php


namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\base\Model;

class ActivityRepository extends Component
{
    public function getDb()
    {
        return \Yii::$app->db;
    }

    /**
     * @param $model Model
     */

    public function saveActivity($model)
    {
        $count = $this->getDb()->createCommand()
            ->insert('activity', $model->getAttributes(['title', 'description', 'dateStart']))
            ->execute();

        return $count;
    }

    public function getActivityById($id)
    {
        $stmt = $this->getDb()->createCommand('SELECT * from activity WHERE id = :id', [':id' => $id])->queryOne();

        $model = new Activity();
        $model->setAttributes($stmt);

        return $model;
    }

}