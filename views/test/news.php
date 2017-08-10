<?php
/**
 * Created by PhpStorm.
 * User: Rustam
 * Date: 23.07.2017
 * Time: 19:14
 */
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="main_wrapper news">
    <ul class="breadcrumbs_left breadcrumbs col-xs-12">
        <li><a href="#"><i class="fa fa-home"></i>Главная</a></li>
        <li>Новости</li>
    </ul>

    <div class="main col-xs-12">
        <div class="content col-xs-12">
            <h1>Новости</h1>
            <div class="content">
                <div class="news">
                    <div class="row">
                        <div class="news_item col-xs-12 col-sm-6">
                            <div class="news_item_event_date col-xs-12">
                                <i class="fa-calendar fa"></i>
                                <span>21.12.2017 - 22.12.2017</span>
                            </div>
                            <div class="news_item_image col-xs-12 col-sm-12 col-md-4"> <?= Html::img("@web/img/news_preview/1.jpg", ['alt' => 'Новость1']) ?></div>
                            <div class="news_item_content col-xs-12 col-sm-12 col-md-8">
                                <a href="<?= Url::to(['/test/news_1'])?>" class="news_item_title">Состоялся турнир по бодибилдингу</a>
                                <div class="news_item_text">
                                    <p>Краткое описание включает в себя вводную часть каждой новости. Это позволяет пользователю ознакомиться поверхностно с большим количеством новостей и отобрать искомую информацию.</p>
                                </div>
                                <div class="news_item_public_date">Опубликовано: 25.10.2017</div>
                            </div>
                            <hr class="col-xs-10 col-sm-11">
                        </div>
                        <div class="news_item col-xs-12 col-sm-6">
                            <div class="news_item_event_date col-xs-12">
                                <i class="fa-calendar fa"></i>
                                <span>25.10.2017</span>
                            </div>
                            <div class="news_item_image col-xs-12 col-sm-12 col-md-4"> <?= Html::img("@web/img/news_preview/2.jpg", ['alt' => 'Новость2']) ?></div>
                            <div class="news_item_content col-xs-12 col-sm-12 col-md-8">
                                <a href="<?= Url::to(['/test/news_1'])?>" class="news_item_title">Объявляется набор в группу по плаванию</a>
                                <div class="news_item_text">
                                    <p>С 01.07.2017 начинаются групповые занятия в плавательном бассейне. В группу набираются мальчики и девочки от 5 до 14 лет.</p>
                                </div>
                                <div class="news_item_public_date">Опубликовано: 25.10.2017</div>
                            </div>
                            <hr class="col-xs-10 col-sm-11">
                        </div>
                    </div>
                    <div class="row">
                        <div class="news_item col-xs-12 col-sm-6">
                            <div class="news_item_event_date col-xs-12">
                                <i class="fa-calendar fa"></i>
                                <span>18.09.2017</span>
                            </div>
                            <div class="news_item_image col-xs-12 col-sm-12 col-md-4"> <?= Html::img("@web/img/news_preview/3.jpg", ['alt' => 'Новость3']) ?></div>
                            <div class="news_item_content col-xs-12 col-sm-12 col-md-8">
                                <a href="<?= Url::to(['/test/news_1'])?>" class="news_item_title">Результаты турнира по футболу</a>
                                <div class="news_item_text">
                                    <p>15.06.2017 прошел турнир по футболу, участие в котором приняло 8 команд нашего города.</p>
                                </div>
                                <div class="news_item_public_date">Опубликовано: 25.10.2017</div>
                            </div>
                            <hr class="col-xs-10 col-sm-11">
                        </div>
                        <div class="news_item col-xs-12 col-sm-6">
                            <div class="news_item_event_date col-xs-12">
                                <i class="fa-calendar fa"></i>
                                <span>12.07.2017</span>
                            </div>
                            <div class="news_item_image col-xs-12 col-sm-12 col-md-4"> <?= Html::img("@web/img/news_preview/4.jpg", ['alt' => 'Новость4']) ?></div>
                            <div class="news_item_content col-xs-12 col-sm-12 col-md-8">
                                <a href="<?= Url::to(['/test/news_1'])?>" class="news_item_title">В спортивный комплекс требуется тренер</a>
                                <div class="news_item_text">
                                    <p>В связи с открытием занятий по хоккею, требуется тренер со стажем работы и навыками игры. Дата начала работы с 20.11.2017</p>
                                </div>
                                <div class="news_item_public_date">Опубликовано: 25.10.2017</div>
                            </div>
                            <hr class="col-xs-10 col-sm-11">
                        </div>
                    </div>
                    <div class="row">
                        <div class="news_item col-xs-12 col-sm-6">
                            <div class="news_item_event_date col-xs-12">
                                <i class="fa-calendar fa"></i>
                                <span>05.05.2017</span>
                            </div>
                            <div class="news_item_image col-xs-12 col-sm-12 col-md-4"> <?= Html::img("@web/img/news_preview/5.jpg", ['alt' => 'Новость5']) ?></div>
                            <div class="news_item_content col-xs-12 col-sm-12 col-md-8">
                                <a href="<?= Url::to(['/test/news_1'])?>" class="news_item_title">Открывается набор взрослой группы на фитнес</a>
                                <div class="news_item_text">
                                    <p>Приглашаем желающих на занятия по фитнесу в нашем спортивном зале. Вас будет консультировать наш профессиональный тренер.</p>
                                </div>
                                <div class="news_item_public_date">Опубликовано: 25.10.2017</div>
                            </div>
                            <hr class="col-xs-10 col-sm-11">
                        </div>
                    </div>
                </div>
                <div class="pagination_block col-xs-12">
                    <ul class="pagination">
                        <li class="prev disabled"><span>&laquo;</span></li>
                        <li class="active"><a href="/menu/4" data-page="0">1</a></li>
                        <li><a href="/menu/4/page=2" data-page="1">2</a></li>
                        <li class="next"><a href="/menu/4/page=2" data-page="1">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
