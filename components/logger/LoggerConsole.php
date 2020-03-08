<?php


namespace app\components\logger;


use yii\helpers\Console;

class LoggerConsole implements ILogger
{

    public function log($txt)
    {
        echo Console::ansiFormat($txt, [Console::FG_GREEN]).PHP_EOL;
    }
}