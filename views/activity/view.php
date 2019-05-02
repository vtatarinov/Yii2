<?php

/**
 * @var $this \yii\web\View
 * @var $model \app\models\Activity
 */

use yii\helpers\Html;

?>
<h3><?= Html::encode($model->title); ?></h3>
<p><strong>Описание:</strong> <?= $model->description; ?></p>
<?php if (!empty($model->files)) {
    foreach ($model->filesView as $file) {
        echo Html::tag('p', Html::img('/images/'.$file,['width' => 200, 'alt' => $file]));
    }
}
?>
<div class="form-group">
    <?= Html::a('Редактировать',['/activity/edit'], ['class' => 'btn btn-danger']); ?>
    <?= Html::a('Вернуться в календарь',['/day'], ['class' => 'btn btn-warning']); ?>
</div>
