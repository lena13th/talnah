<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\QuestionarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вопросы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questionary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать вопрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name_field',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
