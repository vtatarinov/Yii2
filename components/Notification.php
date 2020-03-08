<?php


namespace app\components;


interface Notification
{
    public function sendActivity($activities);
}