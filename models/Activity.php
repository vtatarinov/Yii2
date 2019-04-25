<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $dateStart;
    public $isBlocking;
    public $isRepeat;
    public $repeatInterval;

    public function rules()
    {
        return [
            ['title', 'required'],
            ['description', 'string', 'min' => 10],
            ['dateStart', 'string'],
            ['isBlocking', 'boolean'],
            ['isRepeat', 'boolean'],
            ['repeatInterval', 'number']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'dateStart' => 'Дата начала',
            'isBlocking' => 'Блокирующее событие',
            'isRepeat' => 'Повторять',
            'repeatInterval' => 'Повторять через'
        ];
    }
}