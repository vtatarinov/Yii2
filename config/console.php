<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', \app\config\PreConfig::class],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'container' => [
        'singletons' => [
            'app\components\Notification' => ['class' => 'app\components\NotificationService'],
            'notification' => ['class' => \app\components\Notification::class],
            \app\components\logger\ILogger::class => ['class' => \app\components\logger\LoggerConsole::class]
        ],
        'definitions' => [
//            \app\models\Activity::class => ['class' => '']
        ]
    ],
    'components' => [
        'activity' => [
            'class' => \app\components\ActivityComponent::class,
            'activityClass' => '\app\models\Activity'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => '\yii\rbac\DbManager'
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'enableSwiftMailerLogging' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => $params['notificationHost'],
                'username' => $params['notificationUsername'],
                'password' => $params['notificationPassword'],
                'port' => '587',
                'encryption' => 'tls'
            ]
        ],
        'db' => $db,
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
