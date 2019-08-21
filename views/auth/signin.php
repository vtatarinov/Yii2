<?php

/**
 * @var $this \yii\web\View
 * @var $model \app\models\Users
 */

use yii\helpers\Html;

?>
<div class="row">
    <div class="col-md-6">
        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'method' => 'POST'
        ]); ?>
        <?= $form->field($model, 'email'); ?>
        <?= $form->field($model, 'password')->passwordInput(); ?>
        <div class="form-group">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']); ?>
        </div>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
        <?= Html::a('Зарегистрироваться', 'sign-up');  ?>
    </div>
</div>
