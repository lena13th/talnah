<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Sportbuilding */

$this->title = 'Update Sportbuilding: ' . $model->sportbuilding_id;
$this->params['breadcrumbs'][] = ['label' => 'Sportbuildings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sportbuilding_id, 'url' => ['view', 'id' => $model->sportbuilding_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sportbuilding-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
