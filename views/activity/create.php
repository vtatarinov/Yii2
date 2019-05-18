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
        <?= $form->field($model, 'dateStart')->textInput(['value' => \Yii::$app->formatter->asDate($model->dateStart ?? 'now')]); ?>
        <?= $form->field($model, 'dateEnd')->textInput(['value' => \Yii::$app->formatter->asDate($model->dateEnd ?? 'now')]); ?>
        <?= $form->field($model, 'email',
            ['enableClientValidation' => false,
                'enableAjaxValidation' => true]); ?>
        <?= $form->field($model, 'useNotification')->checkbox(); ?>
        <?= $form->field($model, 'isBlocking')->checkbox(); ?>
        <?= $form->field($model, 'isRepeat')->checkbox(); ?>
        <?= $form->field($model, 'repeatInterval')->dropDownList([0 => 'Выберите интервал повторения', 1 => 'Час', 2 => 'День', 3 => 'Месяц', 4 => 'Год']); ?>
        <?= $form->field($model, 'files[]')->fileInput(['multiple' => true]); ?>
        <div class="form-group">
            <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']); ?>
            <?= Html::a('Отмена',['/day'], ['class' => 'btn btn-danger']); ?>
        </div>
    <?php \yii\bootstrap\ActiveForm::end(); ?>
</div>
