<?php

/**
 * @var $this \yii\web\View
 * @var $model \app\models\Users
 */

use yii\helpers\Html;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'method' => 'POST'
    ]); ?>
        <?= $form->field($model, 'username'); ?>
        <?= $form->field($model, 'email'); ?>
        <?= $form->field($model, 'password')->passwordInput(); ?>
        <div class="form-group">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']); ?>
        </div>
    <?php \yii\bootstrap\ActiveForm::end(); ?>
</div>
