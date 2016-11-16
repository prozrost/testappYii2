<?php
use yii\grid\GridView;
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'ID'=>'id',
        'Title'=>'post_title',
        'Text'=>'post_text',
        'Author'=>'name',
        [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия',
            'headerOptions' => ['width' => '80'],
            'template' => '{view}',
        ],
    ],
    'rowOptions' => function ($model, $key, $index, $grid) {
return ['id' => $model['id']];
    },
]); ?>
