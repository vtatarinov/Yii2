<?php


namespace app\commands;


use app\components\Notification;
use yii\console\Controller;

class NotificationController extends Controller
{
    public $from;

    public function options($actionID)
    {
        return ['from'];
    }

    public function optionAliases()
    {
        return ['f' => 'from'];
    }


    public function actionSend()
    {
        if (empty($this->from)) {
            $this->from = date('Y-m-d');
        }

        $activities = \Yii::$app->activity->getActivityWithNotification($this->from);

        if (count($activities) == 0) {
            echo 'Activities for notification not found'.PHP_EOL;
            \Yii::$app->end();
        }

        /** @var Notification $notificationComponent */
        $notificationComponent = \Yii::$container->get('notification');

        $notificationComponent->sendActivity($activities);
    }
}