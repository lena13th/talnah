<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'Страницы раздела';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<?php
//$parent_alias=null;
//if (empty($grf)){$grf=null;}
?>
        <?=
        Html::a('Создать страницу', ['create', 'parent_alias'=>$parent_alias], ['class' => 'btn btn-success']);
        ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'page_id',
            [
//                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'published',
                'pageSummary'=>'Total',
//                'editableOptions'=> [
//                    'placement' => 'bottom',
//                    'header' => ' ',
////                    'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
//                    'data'=> ['Не опубликовано', 'Опубликовано'],
//                ],
                'filter' => Html::activeDropDownList($searchModel, 'published', ['Нет', 'Да'],['class'=>'form-control','prompt' => ' ']),
                'value' => function($data) {
                    if($data->published==1) {
                        return '<span style="color:green;">Опубликовано</span>';
                    }
                    else {
                        return '<span class="text-danger">Не опубликовано</span>';
                    }
                },
                'format' => 'html'
            ],
            'title',
            [
                'attribute'=>'pageOrder',
                'options'=> [
                    'width' => '80px'
                ],
            ],
//            'alias',
            // 'content:ntext',
            // 'parent_alias',
            // 'meta_keywords',
            // 'meta_description',
            // 'updated_on',

            [
                'class' => 'yii\grid\ActionColumn',
                'options'=> [
                    'width' => '80px'
                ],
//                'buttons' => function ($url, $data, $key) {
//                    [
//                    'update' => function ($url, $data, $key) {
//                        if (stripos(' structure directors requisites documents', $data->alias)) {
//                            return  Html::a('Редактировать', $data->alias);
//                        }
//                    },
//                    'view' => function ($url, $data, $key) {
//                        if (stripos(' structure directors requisites documents', $data->alias)) {
//                            return  Html::a('123', 'yandex.ru');
//                        }
//                    },
//                    'delete' => function ($url, $data, $key) {
//                        if (stripos(' structure directors requisites documents', $data->alias)) {
//                            return  Html::a('123', 'yandex.ru');
//                        }
//                    },
//                ],
            ]
        ],
    ]); ?>
</div>
