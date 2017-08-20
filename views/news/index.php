<?php
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->params['active_page'][] = 'news';
?>
<div class="main_wrapper news">
    <ul class="breadcrumbs_left breadcrumbs col-xs-12">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>Новости</li>
    </ul>


    <div class="main col-xs-12">
        <div class="content col-xs-12">
            <h1>Новости</h1>
            <div class="">
                <?php if (!empty($news)): ?>

                <div class="news">


                    <?php foreach ($news as $key => $item_news): ?>
                        <?php
                        if (!($key % 2)) {
                            echo '<div class="row">';
                        }
                        ?>
                        <div class="news_item col-xs-12 col-sm-6">
                            <div class="news_item_event_date col-xs-12">
                                <i class="fa-calendar fa"></i>
                                <span><?=Yii::$app->formatter->asDate( $item_news->date_event_start) ?>
                                    <?php
                                    if (!empty($item_news->date_event_end)) {
                                        echo ' - ' . Yii::$app->formatter->asDate($item_news->date_event_end);
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="news_item_image col-xs-12 col-sm-12 col-md-4">
                                <?= Html::img("@web/img/news_preview/" . $item_news->image, ['alt' => 'Новость1']) ?>
                            </div>
                            <div class="news_item_content col-xs-12 col-sm-12 col-md-8">
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
<!--                    <div class="pagination_block col-xs-12">-->
<!--                        <ul class="pagination">-->
<!--                            <li class="prev disabled"><span>&laquo;</span></li>-->
<!--                            <li class="active"><a href="/menu/4" data-page="0">1</a></li>-->
<!--                            <li><a href="/menu/4/page=2" data-page="1">2</a></li>-->
<!--                            <li class="next"><a href="/menu/4/page=2" data-page="1">&raquo;</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
                    <div class="pagination_block col-xs-12">
                        <?php
                        echo LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                        ?>
                    </div>

                    <?php else: ?>
                        <div class="empty_content empty_center">
                            <div class="h2">Новостей не найдено</div>
                            <p>К сожалению на данный момент на сайте нет опубликованных новостей.</p>
                            <a href="<?= Url::to(['/site/index']) ?> " class="btn btn-default back_to_home"><span>Вернуться на главную</span></a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
