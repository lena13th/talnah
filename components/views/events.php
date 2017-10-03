<?php
//if (!empty($date_news)) {
//    sort($date_news);
//    reset($date_news);
//    $date_news = array_unique($date_news);
//
//}
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

print_r($news);
$news=$date_news[$yr];

?>
<div class="">
    <?php if (!empty($news)): ?>

    <div class="news">


        <?php foreach ($news as $key => $item_news): ?>
            <?php
            if (!($key % 2)) {
                echo '<div class="row">';
            }
            ?>
            <div class="news_item col-xs-12">
                <div class="news_item_event_date col-xs-12">
                    <i class="fa-calendar fa"></i>
                    <span>Дата события: <?=Yii::$app->formatter->asDate( $item_news->date_event_start) ?>
                        <?php
                        if (!empty($item_news->date_event_end)) {
                            echo ' - ' . Yii::$app->formatter->asDate($item_news->date_event_end);
                        }
                        ?>
                                </span>
                </div>
                <div class="news_item_image col-xs-12 col-sm-12 col-md-3">
<!--                    --><?//= Html::img("@web/img/news_preview/" . $item_news->image, ['alt' => 'Новость1']) ?>
                    <?php $image = $item_news->getImage(); ?>
                    <?= Html::img($image->getUrl('173px'), ['alt' => $item_news->title]) ?>

                </div>
                <div class="news_item_content col-xs-12 col-sm-12 col-md-9">
                    <a href="<?= Url::to(['/news/view', 'id' => $item_news->id]) ?>"
                       class="news_item_title">
                        <?= $item_news->title ?></a>
                    <div class="news_item_text">
                        <p><?= $item_news->short_description ?></p>
                    </div>
                    <div class="news_item_public_date">Опубликовано: <?= Yii::$app->formatter->asDate($item_news->date_public )?></div>
                </div>
                <hr class="col-xs-10 col-sm-11">
            </div>
            <?php

            if (($key % 2) || ($key == count($news) - 1)) {
                echo '</div>';

            }
            ?>
        <?php endforeach; ?>
        <div class="pagination_block col-xs-12">
            <?php
            echo LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
        </div>

        <?php endif; ?>

    </div>
</div>