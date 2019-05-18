<?php


namespace app\behaviors;


use yii\base\Behavior;

class DateCreatedBehavior extends Behavior
{
    public $attributeName;

    public function getDateCreated()
    {
        return \Yii::$app->formatter->asDatetime($this->owner->{$this->attributeName}, 'php:d.m.Y H:i:s');
    }
}