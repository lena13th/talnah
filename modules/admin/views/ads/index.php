<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AdsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объявления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать объявление', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'ads_id',
//            'title',
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
            [
                'attribute' => 'content',
                'format' => 'html'
            ],
//            'updated_on',

            [
                'class' => 'yii\grid\ActionColumn',
                'options'=> [
                    'width' => '80px'
                ]
            ]
        ],
    ]); ?>
</div>
