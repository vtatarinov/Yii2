<?php


namespace app\widgets\activity\assets;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class ActivityWidgetAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/activity/';

    public $js = [
        'js/widget.js'
    ];

    public $depends = [
        JqueryAsset::class
    ];
}