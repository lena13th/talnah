<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SportbuildingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sportbuildings';
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

            'sportbuilding_id',
            'full_title',
            'alias',
            'published',
            'work_hours',
            // 'phone',
            // 'address',
            // 'email:email',
            // 'updated_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
