<?php
use kartik\widgets\DatePicker;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="main_public">
        <?= $form->field($model, 'published')->checkbox([ '0', '1', 'class'=>'is_boolean']) ?>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <!--    --><?//= $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>
    <?php
    echo $form->field($model, 'short_description')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 200,
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ]),
    ]);
    ?>
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
    <div class="col-xs-12 col-md-6">
        <label>Дата начала события</label>
        <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'date_event_start',
            'value' => date('Y-m-d'),
            'options' => ['placeholder' => 'Выберите дату'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
            ],
        ]);
        ?><br>
    </div>
    <div class="col-xs-12 col-md-6">
        <label>Дата окончания события</label>
        <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'date_event_end',
            'value' => date('Y-m-d'),
            'options' => ['placeholder' => 'Выберите дату'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
            ],
        ]);
        ?><br>
    </div>
        <?= $form->field($model, 'related_news')->textInput() ?>


<!--    --><?//= $form->field($model, 'date_event_start')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'date_event_end')->textInput() ?>

<!--    --><?//= $form->field($model, 'related_sportbuilding')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
