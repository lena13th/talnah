<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Questionary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="questionary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_field')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'published')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
