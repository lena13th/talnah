<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Sportbuilding */

$this->title = $model->sportbuilding_id;
$this->params['breadcrumbs'][] = ['label' => 'Sportbuildings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportbuilding-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sportbuilding_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sportbuilding_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sportbuilding_id',
            'full_title',
            'alias',
            [
                'attribute'=>'published',
                'value' => checkPublic($model->published),
            ],
            'work_hours',
            'phone',
            'address',
            'email:email',
            'updated_on',
        ],
    ]) ?>

</div>
