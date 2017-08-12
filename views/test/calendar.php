<?php
/**
 * Created by PhpStorm.
 * User: Rustam
 * Date: 23.07.2017
 * Time: 19:14
 */
use yii\helpers\Url;
$days = 31;
$before = 3;
//use app\assets\CalendarAsset;
//CalendarAsset::register($this);
?>
<div class="main_wrapper">
    <ul class="breadcrumbs col-lg-offset-3">
        <li><a href="#"><i class="fa fa-home"></i>Главная</a></li>
        <li>Календарь спортивных мероприятий</li>
    </ul>

    <div class="main">
        <div class="left main_left col-xs-12 col-md-12 col-lg-3">
            <div class="left_block">
                <div class="left_block_content">
                    <ul class="left_menu">
                        <li><a href="#">Отчет о проведенных мероприятиях в 2016 году</a></li>
                        <li><a href="#">Отчет о проведенных мероприятиях в 2017 году</a></li>
                        <li><a href="#">Отчет о проведенных мероприятиях в 2018 году</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content col-xs-12 col-sm-9 col-md-8 col-lg-9">
            <h1>Календарь спортивных мероприятий</h1>
            <div class="calendar">


                <?php
                foreach ($gov_data as $key => $value) {
                    if (strripos(' Январь Февраль Март Апрель Май Июнь Июль Август Сентябрь Октябрь Ноябрь Декабрь ', $key)) { ?>
                <div class="month <?= ($current_month==$key) ? 'active_month': 'disable_month'; ?>">
                    <div class="calendar_header h2"><?= $key.' '.$gov_data["Год/Месяц"] ?></div>
                    <div class="month_before"><a href="<?= Url::to(['/test/news'])?>">< Июль</a></div>
                    <div class="month_before"><a href="<?= Url::to(['/test/news'])?>"> Сентябрь ></a></div>
                    <div class="week">
                        <div>Понедельник</div>
                        <div>Вторник</div>
                        <div>Среда</div>
                        <div>Четверг</div>
                        <div>Пятница</div>
                        <div>Суббота</div>
                        <div>Воскресенье</div>
                    </div>
                    <div class="calendar_body">
                            <div class="week_days">
                                <?php if ($i==0) {
                                    for ($j = 0; $j < $before; $j++) { ?>
                                        <div class="day"></div>
                                    <?php }
                                    for ($x = $before; $x < $days; $x++) { ?>
                                        <div class="day">
                                            <?= $x ?>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                    </div>
                </div>

                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
