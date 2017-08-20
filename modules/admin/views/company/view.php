<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->company_id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'company_id',
            'organization',
            'name',
            'phone',
            'address',
            'email:email',
            'requisites:ntext',
            'documents:ntext',
            'image',
            'rekblock:ntext',
//            'meta_title',
//            'meta_keywords',
//            'meta_description',
//            'updated_on',
        ],
    ]) ?>

</div>
