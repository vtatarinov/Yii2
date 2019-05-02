<?php

/**
 * @var $this \yii\web\View
 * @var $model \app\models\Activity
 */

use yii\helpers\Html;

$this->title = 'Добавление события';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-activity-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = \yii\bootstrap\ActiveForm::begin([

    ]); ?>
        <?= $form->field($model, 'title'); ?>
        <?= $form->field($model, 'description')->textarea(); ?>
        <?= $form->field($model, 'dateStart')->textInput(['value' => \Yii::$app->formatter->asDate($model->startDate ?? 'now', 'php:d.m.Y')]); ?>
        <?= $form->field($model, 'email',
            ['enableClientValidation' => false,
                'enableAjaxValidation' => true]); ?>
        <?= $form->field($model, 'useNotification')->checkbox(); ?>
        <?= $form->field($model, 'isBlocking')->checkbox(); ?>
        <?= $form->field($model, 'isRepeat')->checkbox(); ?>
        <?= $form->field($model, 'repeatInterval')->dropDownList($model->repeatInterval); ?>
        <?= $form->field($model, 'files[]')->fileInput(['multiple' => true]); ?>
        <div class="form-group">
            <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']); ?>
            <?= Html::a('Отмена',['/day'], ['class' => 'btn btn-danger']); ?>
        </div>
    <?php \yii\bootstrap\ActiveForm::end(); ?>
</div>
