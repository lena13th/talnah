<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SportbuildingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Спортивные сооружения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportbuilding-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sportbuilding', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'sportbuilding_id',
            'full_title',
            'alias',
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
            'work_hours',
            // 'phone',
            // 'address',
            // 'email:email',
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
