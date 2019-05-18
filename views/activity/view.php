<?php

/**
 * @var $this \yii\web\View
 * @var $model \app\models\Activity
 */

use yii\helpers\Html;

?>
<h3><?= Html::encode($model->title); ?></h3>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tbody>
        <tr>
            <th scope="col">Название</th>
            <th><?= $model->title; ?></th>
        </tr>
        <tr>
            <th scope="col">Описание</th>
            <th><?= $model->description; ?></th>
        </tr>
        <tr>
            <th scope="col">Дата начала</th>
            <th><?= \Yii::$app->formatter->asDate($model->dateStart); ?></th>
        </tr>
        <?php if (isset($model->dateEnd)) {
            echo '<tr>
                    <th scope="col">Дата окончания</th>
                    <th>'.\Yii::$app->formatter->asDate($model->dateEnd).'</th>
                  </tr>';
        }
        ?>
        <tr>
            <th scope="col">Автор</th>
            <th><?= $model->userId; ?></th>
        </tr>
        <tr>
            <th scope="col">Создано</th>
            <th><?= $model->getDateCreated(); ?></th>
        </tr>
        </tbody>
    </table>
</div>
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
