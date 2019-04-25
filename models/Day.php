<?php


namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $title;
    public $isWork;
    public $activities;

    public function rules()
    {
        return [
            ['title', 'required'],
            ['isWork', 'boolean'],
            ['activities', 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'isWork' => 'Рабочий день',
            'activities' => 'События на день'
        ];
    }
}