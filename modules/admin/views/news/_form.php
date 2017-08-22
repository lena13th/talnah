<?php

use kartik\widgets\DatePicker;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\News */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .album-form h1 {
        padding-right: 170px;
    }
</style>
<div class="album-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="main_public">
        <?= $form->field($model, 'published')->checkbox([ '0', '1', 'class'=>'is_boolean']) ?>
    </div>

    <?php $img = $model->getImage(); ?>
    <?php if($img->filePath != 'no_image.jpg') {?>
        <div>
            <?= Html::a('Удалить изображение', ['deletephoto', 'id' => $model->id, 'image'=>$img->id, 'g'=>0], ['class' => 'remove_gallery_image', 'data-id'=>$model->id, 'data-g'=>0, 'data-image' => $img->id]) ?><br>
            <img src="<?php echo $img->getUrl('150x')?>" alt="<?= $model->title ?>">
        </div>

    <?php } ?>

    <?= $form->field($model, 'image')->fileInput() ?>

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

<!--    --><?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 200,
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ]),
    ]);
    ?>

<!--    --><?//= $form->field($model, 'date_event_start')->textInput() ?>
    <div class="col-xs-12 col-md-4">
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
    <div class="col-xs-12 col-md-4">
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
    <div class="col-xs-12 col-md-4">
        <label>Дата публикации</label>
        <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'date_public',
            'value' => date('Y-m-d'),
            'options' => ['placeholder' => 'Выберите дату'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
            ],
        ]);
        ?><br>
    </div>
    <label for="product-category_id" class="control-label">Связанный анонс</label>
    <select name="News[related_event]" id="product-category_id" class="form-control">
        <option value="0"></option>
        <?= app\modules\admin\components\RelatedNews::widget(['model'=>$model]) ?>
    </select><br>
<!--    --><?//= $form->field($model, 'date_event_end')->textInput() ?>

<!--    --><?//= $form->field($model, 'related_event')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'related_sportbuilding')->textInput() ?>

<!--    --><?//= $form->field($model, 'date_public')->textInput() ?>

    <?php $gallery = $model->getImages(); ?>

    <?php if($gallery[0]->filePath == 'no_image.jpg') { ?>
    <?php } else { ?>
        <div class="row">
            <?php foreach ($gallery as $photo) { ?>
                <?php if($photo->isMain==0) { ?>
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <?= Html::a('Удалить изображение', ['deletephoto', 'id' => $model->id, 'image'=>$photo->id, 'g'=>1], ['class' => 'remove_gallery_image', 'data-id'=>$model->id, 'data-g'=>1, 'data-image' => $photo->id]) ?>
                        <img src="<?php echo $photo->getUrl('150x')?>" alt="<?= $model->title ?>">
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>
    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>