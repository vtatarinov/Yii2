<?php

/**
 * @var $this \yii\web\View
 * @var $model \app\models\Users
 */

use yii\helpers\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
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
