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

    <div class="main_public">
        <?= $form->field($model, 'published')->checkbox([ '0', '1', 'class'=>'is_boolean']) ?>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

   <?php if (!empty($model->sportbuilding)) { ?>
       <?= $form->field($model, 'full_title')->textInput(['maxlength' => true]) ?>
<!--       --><?//= $form->field($model->sportbuilding, 'work_hours')->textInput() ?>
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

       <?php
       echo $form->field($model->sportbuilding, 'work_hours')->widget(CKEditor::className(), [
           'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
               'height' => 100,
               'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
               'inline' => false, //по умолчанию false
           ]),
       ]);
       ?>


<!--       --><?//= $form->field($model->sportbuilding, 'phone')->textInput(['maxlength' => true]) ?>
<!--       --><?//= $form->field($model->sportbuilding, 'address')->textInput(['maxlength' => true]) ?>
<!--       --><?//= $form->field($model->sportbuilding, 'email')->textInput(['maxlength' => true]) ?>

   <?php   } ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 200,
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ]),
    ]);
    ?>
    <?= $form->field($model, 'pageOrder')->textInput(['maxlength' => true]) ?>
<!--    --><?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

<!--    <label for="product-category_id" class="control-label">Родительская страница</label>-->
<!--    <select name="parent_[category_id]" id="product-category_id" class="form-control">-->
<!--        <option value="0"></option>-->
<!--        --><?//= app\modules\admin\components\Pages_parent::widget(['model'=>$model]) ?>
<!--    </select><br>-->

<!--    --><?//= $form->field($model, 'parent_alias')->hiddenInput(['parent_alias' => $parent_alias]) ?>

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
