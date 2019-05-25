<?php


namespace app\commands;


use app\components\NotificationComponent;
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

        /** @var NotificationComponent $notificationComponent */
        $notificationComponent = \Yii::createObject(['class' => NotificationComponent::class,
            'mailer' => \Yii::$app->mailer]);

        $notificationComponent->sendActivity($activities);
    }
}