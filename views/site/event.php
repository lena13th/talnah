<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->params['active_page'][] = 'calendar';

?>
<div class="main_wrapper news_item_page">
    <ul class="breadcrumbs col-xs-12 col-md-10 col-md-offset-1">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li><a href="<?= Url::to(['/calendar/index']) ?>">Календарь</a></li>
        <li><?= $event->title ?></li>
    </ul>

    <div class="main">
        <div class="left main_left col-xs-12 col-md-12 col-lg-3">
            <?= app\components\LeftEventsWidget::Widget(['tpl' => 'leftmenu_events','yr'=>'null']); ?>
        </div>
        <div class="content col-xs-12 col-sm-12 col-md-12 col-lg-9">
            <h1><?= $event->title ?></h1>
            <div class="news_item">
                <div class="news_item_event_date">
                    <i class="fa-calendar fa"></i>
                    <span>
                        <?=Yii::$app->formatter->asDate( $event->date_event_start) ?>
                        <?php
                        if (!empty($event->date_event_end)) {
                            echo ' - ' . Yii::$app->formatter->asDate($event->date_event_end);
                        }
                        ?>
                    </span>
                </div>
                <br>
<!--                <div class="clearfix"></div>-->
<!--                <div class="clearfix"></div>-->
                <!--                --><?php //} ?>
                <div class="news_item_content">
                    <div class="news_item_text">
                        <p><?= $event->content ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

