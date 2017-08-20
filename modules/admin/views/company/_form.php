<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'organization')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textarea(['maxlength' => true, 'rows' => '2']) ?>

    <?= $form->field($model, 'address')->textarea(['maxlength' => true, 'rows' => '2']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requisites')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'documents')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rekblock')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
