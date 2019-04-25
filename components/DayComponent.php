<?php


namespace app\components;


use yii\base\Component;
use app\models\Day;

class DayComponent extends Component
{
    public $dayClass;

    public function init()
    {
        parent::init();

        if (empty($this->dayClass)){
            throw new \Exception('Need dayClass param');
        }

    }

    /**
     * @return Day
     */

    public function getModel()
    {
        return new $this->dayClass;
    }
}