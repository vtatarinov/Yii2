<?php


namespace app\widgets\activity;


use yii\bootstrap\Widget;

class ActivityWidgetWidget extends Widget
{
    public function run()
    {
        return $this->render('widget');
    }
}