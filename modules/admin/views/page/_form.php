<?php
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

   <?php if ($grf=='sportbuilding') { ?>
       <?= $form->field($model, 'full_title')->textInput(['maxlength' => true]) ?>
<!--       --><?//= $form->field($model->sportbuilding, 'work_hours')->textInput() ?>
       <?php
       echo $form->field($model->sportbuilding, 'work_hours')->widget(CKEditor::className(), [
           'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
               'height' => 100,
               'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
               'inline' => false, //по умолчанию false
           ]),
       ]);
       ?>
       <?php
       echo $form->field($model->sportbuilding, 'phone')->widget(CKEditor::className(), [
           'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
               'height' => 100,
               'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
               'inline' => false, //по умолчанию false
           ]),
       ]);
       ?>
       <?php
       echo $form->field($model->sportbuilding, 'address')->widget(CKEditor::className(), [
           'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
               'height' => 100,
               'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
               'inline' => false, //по умолчанию false
           ]),
       ]);
       ?>

<!--       --><?//= $form->field($model->sportbuilding, 'phone')->textInput(['maxlength' => true]) ?>
<!--       --><?//= $form->field($model->sportbuilding, 'address')->textInput(['maxlength' => true]) ?>
       <?= $form->field($model->sportbuilding, 'email')->textInput(['maxlength' => true]) ?>

   <?php   } ?>
<!--    --><?//= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'published')->textInput() ?>
    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 200,
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ]),
    ]);
    ?>
<!--    --><?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'parent_alias')->textInput(['maxlength' => true]) ?>

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
