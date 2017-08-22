<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="main_public">
        <?= $form->field($model, 'published')->checkbox([ '0', '1', 'class'=>'is_boolean']) ?>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 200,
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
            'rows' => 6
        ]),
    ]);
    ?>

    <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
