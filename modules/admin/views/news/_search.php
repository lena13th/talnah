<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'published') ?>

    <?= $form->field($model, 'short_description') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'date_event_start') ?>

    <?php // echo $form->field($model, 'date_event_end') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'related_event') ?>

    <?php // echo $form->field($model, 'related_sportbuilding') ?>

    <?php // echo $form->field($model, 'date_public') ?>

    <?php // echo $form->field($model, 'updated_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
