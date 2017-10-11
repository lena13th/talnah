<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Page */
if (!empty($model->full_title)) {
    $this->title = $model->full_title;
} else { $this->title = $model->title;}
//$this->title = $model->sportbuilding->title;
$this->params['breadcrumbs'][] = $model->title;
?>
<div class="page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
         if ($grf=='sportbuilding'){
             $text_delete='Вы уверены что хотите удалить информацию по данному комплексу?';
         }else {
             $text_delete='Вы уверены что хотите удалить данную страницу?';
         }
        ?>
        <?= Html::a('Редактировать', ['update', 'id' => $model->page_id,'grf'=>$grf,'alias'=>$model->alias], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->page_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => $text_delete,
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    if ($grf=='sportbuilding'){
//СПортивные сооружения
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'page_id',
            'title',
            'full_title',
//            'alias',
            [
                'attribute'=>'published',
                'value' => checkPublic($model->published),
            ],
            [
                'attribute' => 'sportbuilding.phone',
                'format' => 'html'
            ],
            [
                'attribute' => 'sportbuilding.address',
                'format' => 'html'
            ],
            [
                'attribute' => 'sportbuilding.work_hours',
                'format' => 'html'
            ],

//            [
//                'attribute' => 'sportbuilding.email',
//                'format' => 'html'
//            ],

            [
                'attribute' => 'content',
                'format' => 'html'
            ],
//            'content:ntext',
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
                [
                    'attribute'=>'published',
                    'value' => checkPublic($model->published),
                ],
                [
                    'attribute' => 'content',
                    'format' => 'html'
                ],
                'pageOrder',
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
