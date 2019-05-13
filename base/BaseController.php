<?php


namespace app\base;


use yii\web\Controller;
use yii\web\HttpException;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            throw new HttpException(401, 'Need authorization');
        }

        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        /**
         * @param \yii\base\Action $action
         * @param mixed $result
         * @return mixed
         */
        $page = \Yii::$app->request->url;
        \Yii::$app->session->set('pageUrl', $page);

        return parent::afterAction($action, $result);
    }
}