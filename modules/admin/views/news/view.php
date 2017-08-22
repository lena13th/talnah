<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use rmrevin\yii\module\Comments;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ноости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить данную новость?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage(); ?>
    <?php $gallery = $model->getImages(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'image',
                'value' => '
                    <div class="prod_img_button"  style="width:150px; display:inline-block;">
                        <a href="'.Url::to($img->getUrl('800x')).'" class="product_image_btn lightbox">'.
                    Html::img($img->getUrl('150x'), ['alt' => $data->title, 'class' => 'product_image img-fluid']).
                    '<i class="fa fa-search-plus" aria-hidden="true" style="font-size: 20px; width: 100%; height: 100%; padding-top: 40px; padding-left: auto;"></i>
                        </a>
                    </div>',
                'format' => 'html',
            ],
            'title',
            [
                'attribute'=>'published',
                'value' => checkPublic($model->published),
            ],
            [
                'attribute' => 'short_description',
                'format' => 'html'
            ],
            [
                'attribute' => 'content',
                'format' => 'html'
            ],

//            'short_description',
//            'content:ntext',
            'date_event_start',
            'date_event_end',
            'related_event',
            'date_public',
        ],
    ]) ?>
    <?php echo Comments\widgets\CommentListWidget::widget([
        'entity' => (string) $model->id, // type and id
        'options'=>['id'=>$model->id],
    ]); ?>
</div>
