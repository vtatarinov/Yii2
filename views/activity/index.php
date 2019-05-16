<?php

/**
 * @var $this \yii\web\View
 * @var $activities \app\controllers\ActivityController
 * @var $model \app\models\ActivitySearch
 * @var $provider \yii\data\ActiveDataProvider
 */

use yii\helpers\Html;

$this->title = 'События';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-activity">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= \app\widgets\activity\ActivityTableWidget::widget(['activities' => $activities]); ?>
    <?= Html::a('Создать',['/activity/create'], ['class' => 'btn btn-primary']); ?>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'options' => [
            'class' => 'table-responsive'
        ],
        'tableOptions' => [
            'class' => 'table table-bordered table-hover'
        ],
        'layout' => "{summary}\n{pager}\n{items}\n{pager}",
        'columns' => [
            [
                'attribute' => 'title',
                'value' => function($model)
                {
                    return Html::a(Html::encode($model->title), ['/activity/view', 'id' => $model->id]);
                },
                'format' => 'html'
            ],
            'description',
            [
                'attribute' => 'dateStart',
                'value' => function($model)
                {
                    return Yii::$app->formatter->asDate($model->dateStart);
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'dateEnd',
                'value' => function($model)
                {
                    return Yii::$app->formatter->asDate($model->dateEnd);
                },
                'format' => 'html'
            ],
            'email',
            'useNotification',
            'isBlocking',
            'isRepeat',
            'repeatInterval',
            'dateCreated',
            'userId'
        ]
    ]); ?>
</div>