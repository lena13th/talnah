<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Page */

$this->title = 'Редактировать страницу';
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->page_id,'grf'=>$grf]];
$this->params['breadcrumbs'][] = 'Редактировать страницу';
?>
<div class="page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'grf'=>$grf,
    ]) ?>

</div>
