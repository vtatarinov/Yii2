<?php


namespace app\components;


use app\models\Activity;
use yii\base\Component;
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
                ->setFrom('')
                ->setTo($activity->email)
                ->setSubject('Событие на сегодня:')
                ->send()) {
                    echo 'E-mail to '.$activity->email.' sended'.PHP_EOL;
            }
        }
    }
}