<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->params['active_page'][] = 'calendar';

?>
<div class="main_wrapper news_item_page">
    <ul class="breadcrumbs breadcrumbs_left">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li><a href="<?= Url::to(['/calendar/index']) ?>">Календарь</a></li>
        <li>Отчет о проведенных мероприятиях в <?=$yr  ?> году </li>
    </ul>

    <div class="main">
        <div class="left main_left col-xs-12 col-md-12 col-lg-3">
            <?= app\components\LeftEventsWidget::Widget(['tpl' => 'leftmenu_events','yr'=>'null']); ?>
        </div>
        <div class="content col-xs-12 col-sm-12 col-md-12 col-lg-9">
            <h1 class="col-xs-12"> Отчет о проведенных мероприятиях в <?=$yr  ?> году</h1>
            <?= app\components\LeftEventsWidget::Widget(['tpl' => 'events','yr'=>$yr]); ?>
        </div>
    </div>
</div>

