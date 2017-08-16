<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\NewsAsset;
NewsAsset::register($this);
?>
<div class="main_wrapper news_item_page">
    <ul class="breadcrumbs col-xs-12 col-md-10 col-md-offset-1">
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
                    <span>
                        <?= $news->date_event_start ?>
                        <?php
                        if (!empty($news->date_event_end)) {
                            echo ' - ' . $news->date_event_end;
                        }
                        ?>
                    </span>
                </div>
                <div class="slider">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <?= Html::img("@web/images/news_item/1/1.jpg", ['alt' => 'Новость1']) ?>
                        </div>
                        <div class="item">
                            <?= Html::img("@web/images/news_item/1/2.jpg", ['alt' => 'Новость1']) ?>
                        </div>
                        <div class="item">
                            <?= Html::img("@web/images/news_item/1/3.jpg", ['alt' => 'Новость1']) ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="news_item_content">
                    <div class="news_item_text">
                        <p><?= $news->content ?></p>
                    </div>
                    <div class="news_item_public_date">Опубликовано: <?= $news->date_public ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

