<?php


namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\console\Application;
use yii\log\Logger;
use yii\mail\MailerInterface;

class NotificationComponent extends Component
{
    /** @var MailerInterface */
    public $mailer;

    /**
     * @param $activities Activity[]
     */
    public function sendActivity($activities)
    {
        foreach ($activities as $activity) {
            if ($this->mailer->compose('activity', ['model' => $activity])
                ->setFrom(\Yii::$app->params['notificationUsername'])
                ->setTo($activity->email)
                ->setSubject('Событие на сегодня:')
                ->send()) {
                    if (\Yii::$app instanceof Application) {
                        echo 'E-mail to '.$activity->email.' sended'.PHP_EOL;
                    } else {
                        \Yii::getLogger()->log('E-mail to '.$activity->email.' sended', Logger::LEVEL_INFO);
                    }
            }
        }
    }
}