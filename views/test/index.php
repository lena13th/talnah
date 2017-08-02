<?php use yii\helpers\Url; ?>
<?php use yii\helpers\Html; ?>

<div class="main_wrapper">
    <div class="main">
        <div class="left col-xs-12 col-md-12 col-lg-3">
            <div class="left_block col-sm-6 col-lg-12">
                <div class="left_block_header h3">Объявления</div>
                <div class="left_block_content">
                    <p>С 25.05.2017 г. по 30.06.2017 г.</p>
                    <p>Стоимость посещения в бассейн:</p>
                    <p>Для взрослых: 250 руб.</p>
                    <p>Для детей: 150 руб.</p>
                    <hr>
                    <p>ВНИМАНИЕ!!!</p><p>12.06.2017 г. бассейн закрыт.</p>
                    <p>Приносим извинения за неудобства</p>
                </div>
            </div>
            <div class="ad col-sm-6 col-lg-12">
                <a href="#"><img src="img/talnah_01.jpg" style="display: block; margin:0 auto; margin-top: 5px;" alt=""></a>
                <a href="#"><img src="img/talnah_02.jpg" style="display: block; margin:0 auto; margin-top: 5px;" alt=""></a>
                <a href="#"><img src="img/talnah_03.jpg" style="display: block; margin:0 auto; margin-top: 5px;" alt=""></a>
            </div>
        </div>
        <div class="content col-xs-12 col-sm-9 col-md-8 col-lg-6">
            <div class="h3">Лента новостей</div>
            <div class="news">
                <div class="news_item row">
                    <div class="news_item_event_date col-xs-12">
                        <i class="fa-calendar fa"></i>
                        <span>21.12.2017 - 22.12.2017</span>
                    </div>
                    <div class="news_item_image col-xs-12 col-sm-4"> <?= Html::img("@web/img/news_preview/1.jpg", ['alt' => 'Новость1']) ?></div>
                    <div class="news_item_content col-xs-12 col-sm-8">
                        <a href="" class="news_item_title">Состоялся турнир по бодибилдингу</a>
                        <div class="news_item_text">
                            <p>Краткое описание включает в себя вводную часть каждой новости. Это позволяет пользователю ознакомиться поверхностно с большим количеством новостей и отобрать искомую информацию.</p>
                        </div>
                        <div class="news_item_public_date">Опубликовано: 25.10.2017</div>
                    </div>
                </div>
                <hr>
                <div class="news_item row">
                    <div class="news_item_event_date col-xs-12">
                        <i class="fa-calendar fa"></i>
                        <span>25.10.2017</span>
                    </div>
                    <div class="news_item_image col-xs-12 col-sm-4"> <?= Html::img("@web/img/news_preview/2.jpg", ['alt' => 'Новость2']) ?></div>
                    <div class="news_item_content col-xs-12 col-sm-8">
                        <a href="" class="news_item_title">Объявляется набор в группу по плаванию</a>
                        <div class="news_item_text">
                            <p>С 01.07.2017 начинаются групповые занятия в плавательном бассейне. В группу набираются мальчики и девочки от 5 до 14 лет.</p>
                        </div>
                        <div class="news_item_public_date">Опубликовано: 25.10.2017</div>
                    </div>
                </div>
                <hr>
                <div class="news_item row">
                    <div class="news_item_event_date col-xs-12">
                        <i class="fa-calendar fa"></i>
                        <span>18.09.2017</span>
                    </div>
                    <div class="news_item_image col-xs-12 col-sm-4"> <?= Html::img("@web/img/news_preview/3.jpg", ['alt' => 'Новость3']) ?></div>
                    <div class="news_item_content col-xs-12 col-sm-8">
                        <a href="" class="news_item_title">Результаты турнира по футболу</a>
                        <div class="news_item_text">
                            <p>15.06.2017 прошел турнир по футболу, участие в котором приняло 8 команд нашего города.</p>
                        </div>
                        <div class="news_item_public_date">Опубликовано: 25.10.2017</div>
                    </div>
                </div>
                <hr>
                <div class="news_item row">
                    <div class="news_item_event_date col-xs-12">
                        <i class="fa-calendar fa"></i>
                        <span>12.07.2017</span>
                    </div>
                    <div class="news_item_image col-xs-12 col-sm-4"> <?= Html::img("@web/img/news_preview/4.jpg", ['alt' => 'Новость4']) ?></div>
                    <div class="news_item_content col-xs-12 col-sm-8">
                        <a href="" class="news_item_title">В спортивный комплекс требуется тренер</a>
                        <div class="news_item_text">
                            <p>В связи с открытием занятий по хоккею, требуется тренер со стажем работы и навыками игры. Дата начала работы с 20.11.2017</p>
                        </div>
                        <div class="news_item_public_date">Опубликовано: 25.10.2017</div>
                    </div>
                </div>
                <hr>
                <div class="news_item row">
                    <div class="news_item_event_date col-xs-12">
                        <i class="fa-calendar fa"></i>
                        <span>05.05.2017</span>
                    </div>
                    <div class="news_item_image col-xs-12 col-sm-4"> <?= Html::img("@web/img/news_preview/5.jpg", ['alt' => 'Новость5']) ?></div>
                    <div class="news_item_content col-xs-12 col-sm-8">
                        <a href="" class="news_item_title">Открывается набор взрослой группы на фитнес</a>
                        <div class="news_item_text">
                            <p>Приглашаем желающих на занятия по фитнесу в нашем спортивном зале. Вас будет консультировать наш профессиональный тренер.</p>
                        </div>
                        <div class="news_item_public_date">Опубликовано: 25.10.2017</div>
                    </div>
                </div>
                <hr>
                <div class="button to_all_news"><a href="#">Все новости <i class="fa fa-angle-right"></i></a></div>
            </div>
        </div>
        <div class="right col-xs-12 col-sm-3 col-md-4 col-lg-3">
            <div class="h3">Анонсы спортивных мероприятий</div>
            <div class="news">
                <div class="news_item row">
                    <div class="news_item_event_date col-xs-12">
                        <i class="fa-calendar fa"></i>
                        <span>30.07.2017</span>
                    </div>
                    <div class="news_item_content col-xs-12">
                        <a href="" class="news_item_title">Турнир по легкой атлетике</a>
                        <div class="news_item_text">
                            <p>Турнир будет проводиться одним днем в СОЦ “Восток”.</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="news_item row">
                    <div class="news_item_event_date col-xs-12">
                        <i class="fa-calendar fa"></i>
                        <span>05.08.2017 - 10.08.2017</span>
                    </div>
                    <div class="news_item_content col-xs-12">
                        <a href="" class="news_item_title">Соревнования по плаванию в группах обучения</a>
                        <div class="news_item_text">
                            <p>Объявляются соревнования среди выпускников групп обучения сезона 2016-2017 года.</p>
                        </div>
                    </div>
                </div>
                <div class="button to_all_news"><a href="#">Календарь <i class="fa fa-angle-right"></i></a></div>
            </div>
        </div>
    </div>
</div>
