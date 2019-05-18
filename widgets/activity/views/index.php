<?php

/**
 * @var $this \yii\web\View
 * @var $activities \app\controllers\ActivityController
 */
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <?php foreach ($activities[0] as $k => $v): ?>
                <td><?= \yii\bootstrap\Html::encode($k); ?></td>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($activities as $v): ?>
            <tr>
                <?php foreach ($v as $value): ?>
                    <td><?= \yii\bootstrap\Html::encode($value); ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
