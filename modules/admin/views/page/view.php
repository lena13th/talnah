<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Page */

$this->title = $model->full_title;
//$this->title = $model->sportbuilding->title;
if ($grf=='sportbuilding'){
    $this->params['breadcrumbs'][] = ['label' => 'Спортивные сооружения', 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->page_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->page_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить данную страницу?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    if ($grf=='sportbuilding'){

    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'page_id',
            'title',
            'full_title',
//            'alias',
            'published',
            [
                'attribute' => 'sportbuilding.phone',
                'format' => 'html'
            ],
            [
                'attribute' => 'content',
                'format' => 'html'
            ],
//            'content:ntext',
            'parent_alias',
//            'meta_keywords',
//            'meta_description',
//            'updated_on',
//            'sportbuilding.phone'
        ],

    ]);} else {
        //раздел О нас
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
//                'page_id',
                'title',
//                'full_title',
//                'alias',
                'published',
                [
                    'attribute' => 'content',
                    'format' => 'html'
                ],

//                'content:ntext',
//                'parent_alias',
//                'meta_keywords',
//                'meta_description',
//                'updated_on',
            ],

        ]);
    }


    ?>

</div>
