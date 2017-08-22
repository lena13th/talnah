<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Events */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить данную новость?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'title' ,
            [
                'attribute'=>'published',
                'value' => checkPublic($model->published),
            ],
            [
                'attribute' => 'short_description',
                'format' => 'html'
            ],
            [
                'attribute' => 'content',
                'format' => 'html'
            ],

//            'short_description',
//            'content:ntext',
            'date_event_start',
            'date_event_end',
//            'related_sportbuilding',
//            'updated_on',
        ],
    ]) ?>

</div>
