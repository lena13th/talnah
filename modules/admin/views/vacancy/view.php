<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Vacancy */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Вакансии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->vacancy_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->vacancy_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить данную вакансию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'vacancy_id',
            'title',
            [
                'attribute'=>'published',
                'value' => checkPublic($model->published),
            ],
            'short_description',
            [
                'attribute' => 'content',
                'format' => 'html'
            ],
//            'content:ntext',
            'salary',
//            'meta_title',
//            'meta_keywords',
//            'meta_description',
//            'updated_on',
        ],
    ]) ?>

</div>
