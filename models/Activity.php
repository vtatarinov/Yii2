<?php


namespace app\models;


use app\behaviors\DateCreatedBehavior;

class Activity extends ActivityBase
{
//    public $title;
//    public $description;
//    public $dateStart;
//    public $email;
//    public $useNotification;
//    public $isBlocking;
//    public $isRepeat;
//    public $repeatInterval = [0 => 'Выберите интервал повторения', 1 => 'Час', 2 => 'День', 3 => 'Месяц', 4 => 'Год'];
    public $files = [];
    public $filesView = [];

    public function behaviors()
    {
        return [
            ['class' => DateCreatedBehavior::class,
                'attributeName' => 'dateCreated']
        ];
    }

    public function beforeValidate()
    {
        if (!empty($this->dateStart) || !empty($this->dateEnd)) {
            $dateStart = \DateTime::createFromFormat('d.m.Y', $this->dateStart);
            $dateEnd = \DateTime::createFromFormat('d.m.Y', $this->dateEnd);
            if ($dateStart || $dateEnd) {
                $this->dateStart = $dateStart->format('Y-m-d');
                $this->dateEnd = $dateEnd->format('Y-m-d');
            }
        }

        return parent::beforeValidate();
    }

    public function rules()
    {
        return array_merge([
            ['title', 'required'],
            ['description', 'string', 'min' => 10],
            [['dateStart', 'dateEnd'], 'date', 'format' => 'php:Y-m-d'],
            ['dateEnd', function($attribute, $params) {
                if ($this->$attribute < $this->dateStart) {
                    $this->addError($attribute, 'Дата окончания не может быть раньше даты начала.');
                }
            }],
            ['email', 'email'],
            ['email', 'required', 'when' => function($model) {
                return $model->useNotification == 1;
            }],
            [['useNotification', 'isBlocking', 'isRepeat'], 'boolean'],
            ['repeatInterval', 'required', 'when' => function($model) {
                return $model->isRepeat == 1;
            }],
//            ['repeatInterval', 'in', 'range' => array_keys($this->repeatInterval)],
            ['files', 'file', 'extensions' => ['jpg', 'png', 'pdf'], 'maxFiles' => 4]
        ], parent::rules());
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'dateStart' => 'Дата начала',
            'dateEnd' => 'Дата окончания',
            'email' => 'E-mail',
            'useNotification' => 'Уведомлять',
            'isBlocking' => 'Блокирующее событие',
            'isRepeat' => 'Повторять',
            'repeatInterval' => 'Повторять через',
            'files' => 'Добавить файлы'
        ];
    }
}