<?php use yii\widgets\DetailView;
use yii\helpers\Html;
?>
<?= DetailView::widget([
    'model' => $data,
    'attributes' => [
        'id',
        'post_title',
        'post_text',
        'name'
    ],
]);
?>
<?= Html::a('Назад', ['/site/index'], ['class'=>'btn btn-primary']) ?>
