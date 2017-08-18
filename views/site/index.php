<?php
use kartik\datecontrol\DateControl;
use yii\helpers\Url;
use yii\helpers\Html;
$this->params['active_page'][] = 'index';
?>

<div class="main_wrapper">
    <div class="main">
        <?php if (!((empty($ads))&&(empty($company->rekblock)))): ?>

        <div class="left col-xs-12 col-md-12 col-lg-3">
            <?php if (!empty($ads)): ?>

            <div class="left_block col-sm-6 col-lg-12">
                <div class="left_block_header h3">Объявления</div>
                <div class="left_block_content">
                    <?php foreach ($ads as $key => $item_ads): ?>
                        <?php
                            if ($key!='0'){echo '<hr>';}
                        ?>
                        <?= $item_ads->title ?>
                        <?= $item_ads->content ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if (!empty($company->rekblock)): ?>
            <div class="ad col-sm-6 col-lg-12">
                <?= $company->rekblock ?>
            </div>
            <?php endif; ?>

        </div>
        <div class="content col-xs-12 col-sm-9 col-md-8 col-lg-6">
            <?php else: ?>
        <div class="content col-xs-12 col-sm-9 col-md-8 col-lg-9">

            <?php endif; ?>

            <div class="h3">Лента новостей</div>
            <div class="news">
                <?php foreach ($news as $item_news): ?>
                <div class="news_item row">
                    <div class="news_item_event_date col-xs-12">
                        <i class="fa-calendar fa"></i>


                        <span><?= Yii::$app->formatter->asDate($item_news->date_event_start) ?>
                            <?php
                                if (!empty($item_news->date_event_end)){
                                echo ' - '.Yii::$app->formatter->asDate($item_news->date_event_end);
                            }
                            ?>
                        </span>
                    </div>
                    <div class="news_item_image col-xs-12 col-sm-4">
                        <?php $image = $item_news->getImage(); ?>
<!--                        <img src="--><?php //echo $image->getUrl('173px')?><!--" alt="--><?//= $item_news->title ?><!--">-->
                        <?= Html::img($image->getUrl('173px'), ['alt' => $item_news->title]) ?></div>
                    <div class="news_item_content col-xs-12 col-sm-8">
                        <a href="<?= Url::to(['/news/view', 'id'=>$item_news->id]) ?>" class="news_item_title"><?= $item_news->title ?></a>
                        <div class="news_item_text">
                            <p><?= $item_news->short_description ?></p>
                        </div>
<!--                        <div class="news_item_public_date">Опубликовано: --><?//= $item_news->date_public ?><!--</div>-->
                        <div class="news_item_public_date">Опубликовано: <?= Yii::$app->formatter->asDate( $item_news->date_public) ?></div>
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>
                <div class="button to_all_news"><a href="<?= Url::to(['/news/index']) ?>">Все новости <i class="fa fa-angle-right"></i></a></div>
            </div>
        </div>
        <div class="right col-xs-12 col-sm-3 col-md-4 col-lg-3">
            <div class="h3">Анонсы спортивных мероприятий</div>
            <div class="news">
                <?php foreach ($events as $key => $event): ?>
                <?php
                if ($key!='0'){echo '<hr>';}
                ?>
                <div class="news_item row">
                    <div class="news_item_event_date col-xs-12">
                        <i class="fa-calendar fa"></i>
                        <span><?= Yii::$app->formatter->asDate($event->date_event_start) ?>
                            <?php
                            if (!empty($event->date_event_end)){
                                echo ' - '.Yii::$app->formatter->asDate($event->date_event_end);
                            }
                            ?>
                        </span>
                    </div>
                    <div class="news_item_content col-xs-12">
                        <a href="<?= Url::to(['/site/event', 'id'=>$event->id]) ?>" class="news_item_title"><?= $event->title ?></a>
                        <div class="news_item_text">
                            <p><?= $event->short_description ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="button to_all_news"><a href="<?= Url::to(['/calendar/index']) ?>">Календарь <i class="fa fa-angle-right"></i></a></div>
            </div>
        </div>
    </div>
</div>
