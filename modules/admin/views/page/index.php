<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            'published',
            'title',
//            'full_title',
//            'alias',
            // 'content:ntext',
            // 'parent_alias',
            // 'meta_keywords',
            // 'meta_description',
            // 'updated_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
