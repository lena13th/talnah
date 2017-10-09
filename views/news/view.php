<?php
use \yii2mod\comments\widgets\Comment;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\NewsAsset;

NewsAsset::register($this);

$this->params['active_page'][] = 'news';
use rmrevin\yii\module\Comments;


?>
<div class="main_wrapper news_item_page">
    <ul class="breadcrumbs col-xs-12 col-md-10 col-md-offset-1" style="padding-left:15px">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li><a href="<?= Url::to(['/news/index']) ?>">Новости</a></li>
        <li><?= $news->title ?></li>
    </ul>

    <div class="main">
        <div class="content col-xs-12 col-md-10 col-md-offset-1">
            <h1><?= $news->title ?></h1>
            <div class="news_item">
                <div class="news_item_event_date">
                    <i class="fa-calendar fa"></i>
                    <span> Дата события: 
                        <?=Yii::$app->formatter->asDate( $news->date_event_start) ?>
                        <?php
                        if (!empty($news->date_event_end)) {
                            echo ' - ' . Yii::$app->formatter->asDate($news->date_event_end);
                        }
                        ?>
                    </span>
                </div>
                <?php $gallery = $news->getImages(); ?>

<!--                --><?php //if (count($gallery) > 0) { ?>
                <div class="slider">
                    <div class="owl-carousel owl-theme">

                        <?php if($gallery[0]->filePath == 'no_image.jpg') { ?>
                        <?php } else { ?>
                            <?php foreach ($gallery as $photo) { ?>
                                <?php if($photo->isMain==0) { ?>
                                    <div class="item">
                                        <img src="<?php echo $photo->getUrl('800px')?>" alt="<?= $news->title ?>">
                                        <a class="download_photo" href="<?php echo $photo->getUrl('800px')?>" download="<?php echo $photo->urlAlias?>.<?php echo $photo->getExtension()?>">Скачать <i class="fa fa-download" aria-hidden="true"></i></a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="clearfix"></div>
<!--                --><?php //} ?>
                <div class="news_item_content">
                    <div class="news_item_text">
                        <p><?= $news->content ?></p>
                    </div>
                    <div class="news_item_public_date">Опубликовано: <?= Yii::$app->formatter->asDate($news->date_public) ?></div>
                </div>
            </div>
<!--            --><?php //echo Comment::widget([
//                'model' => $news,
//            ]); ?>
            <hr>
<?php echo Comments\widgets\CommentListWidget::widget([
           'entity' => (string) $news->id, // type and id
            'options'=>['id'=>$news->id],
           ]); ?>
        </div>
    </div>
</div>

