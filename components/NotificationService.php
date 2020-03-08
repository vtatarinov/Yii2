<?php


namespace app\components;


use app\components\logger\ILogger;
use yii\mail\MailerInterface;

class NotificationService implements Notification
{
    /** @var MailerInterface */
    private $mailer;

    /** @var ILogger */
    private $logger;

    public function __construct(MailerInterface $mailer, ILogger $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

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
                    $this->logger->log('E-mail to '.$activity->email.' sended');
            }
        }
    }
}