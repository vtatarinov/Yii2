<?php


namespace app\config;


use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\mail\MailerInterface;

class PreConfig implements BootstrapInterface
{

    /**
     * @inheritDoc
     */
    public function bootstrap($app)
    {
        \Yii::$container->set(MailerInterface::class, function ()
        {
            return \Yii::$app->mailer;
        });
    }
}