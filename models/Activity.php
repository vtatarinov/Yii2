<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $dateStart;
    public $email;
    public $useNotification;
    public $isBlocking;
    public $isRepeat;
    public $repeatInterval = [0 => 'Час', 1 => 'День', 2 => 'Месяц', 3 => 'Год'];
    public $files = [];
    public $filesView = [];

    public function beforeValidate()
    {
        if (!empty($this->dateStart)) {
            $date = \DateTime::createFromFormat('d.m.Y', $this->dateStart);
            if ($date) {
                $this->dateStart = $date->format('Y-m-d');
            }
        }
        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            ['title', 'required'],
            ['description', 'string', 'min' => 10],
            ['dateStart', 'date', 'format' => 'php:Y-m-d'],
            ['email', 'email'],
            ['email', 'required', 'when' => function($model) {
                return $model->useNotification == 1;
            }],
            [['useNotification', 'isBlocking', 'isRepeat'], 'boolean'],
//            ['repeatInterval', 'in', 'range' => array_keys($this->repeatInterval)],
            ['files', 'file', 'extensions' => ['jpg', 'png', 'pdf'], 'maxFiles' => 4]
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'dateStart' => 'Дата начала',
            'email' => 'E-mail',
            'useNotification' => 'Уведомлять',
            'isBlocking' => 'Блокирующее событие',
            'isRepeat' => 'Повторять',
            'repeatInterval' => 'Повторять через',
            'files' => 'Добавить файлы'
        ];
    }
}