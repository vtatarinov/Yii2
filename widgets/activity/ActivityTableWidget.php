<?php


namespace app\widgets\activity;


use yii\bootstrap\Widget;

class ActivityTableWidget extends Widget
{
    public $activities;

    public function run()
    {
        return $this->render('index', ['activities' => $this->activities]);
    }
}