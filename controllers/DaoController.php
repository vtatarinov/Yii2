<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\DAOComponent;
use yii\filters\PageCache;

class DaoController extends BaseController
{

    public function behaviors()
    {
        return [
            ['class' => PageCache::class, 'only' => ['dao'], 'duration' => 10]
        ];
    }

    public function actionDao()
    {
        /** @var DAOComponent $comp */

        $comp = \Yii::createObject(['class' => DAOComponent::class, 'connection' => \Yii::$app->db]);

        $users = $comp->getAllUsers();

        $activityUser = $comp->getActivityUser(\Yii::$app->request->get('user', 1));

        $activityNotification = $comp->getActivityNotification();

        $firstActivity = $comp->getFirstActivity();

        $countActivity = $comp->getCountActivity();

        $comp->testInsert();

        return $this->render('dao', ['users' => $users,
            'activityUser' => $activityUser,
            'activityNotification' => $activityNotification,
            'firstActivity' => $firstActivity,
            'countActivity' => $countActivity]);
    }

    public function actionCache()
    {
        \Yii::$app->cache->set('foo', 'bar');

        $foo = \Yii::$app->cache->get('foo');

        echo $foo.PHP_EOL;
    }
}