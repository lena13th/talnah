<?php
/**
 * Created by PhpStorm.
 * User: Rustam
 * Date: 08.08.2017
 * Time: 22:32
 */
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\NewsAsset;
NewsAsset::register($this);
?>
<div class="main_wrapper news_item_page">
    <ul class="breadcrumbs_left breadcrumbs col-xs-12 col-md-10 col-md-offset-1">
        <li><a href="#"><i class="fa fa-home"></i>Главная</a></li>
        <li><a href="#">Новости</a></li>
        <li>Объявляется набор в группу по плаванию</li>
    </ul>

    <div class="main">
        <div class="content col-xs-12 col-md-10 col-md-offset-1">
            <h1>Объявляется набор в группу по плаванию</h1>
            <div class="news_item">
                <div class="news_item_event_date">
                    <i class="fa-calendar fa"></i>
                    <span>21.12.2017 - 22.12.2017</span>
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
                        <p>Краткое описание включает в себя вводную часть каждой новости. Это позволяет пользователю ознакомиться поверхностно с большим количеством новостей и отобрать искомую информацию.</p>
                    </div>
                    <div class="news_item_public_date">Опубликовано: 25.10.2017</div>
                </div>
            </div>
        </div>
    </div>
</div>

