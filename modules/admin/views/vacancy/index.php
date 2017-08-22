<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вакансии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать вакансию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'vacancy_id',
            'title',
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
            'short_description',
//            'content:ntext',
             'salary',
            // 'meta_title',
            // 'meta_keywords',
            // 'meta_description',
            // 'updated_on',

            [
                'class' => 'yii\grid\ActionColumn',
                'options'=> [
                    'width' => '80px'
                ]
            ]
        ],
    ]); ?>
</div>
