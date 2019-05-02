<?php

/**
 * @var $this \yii\web\View
 * @var $model \app\models\Day
 */

use yii\helpers\Html;

$this->title = 'Дни';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-day-index">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<?= Html::a('Создать',['/activity/create'], ['class' => 'btn btn-primary']); ?>
