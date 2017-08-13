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
$event = array("title"=>'Результаты турнира по футболу',
    "content"=>'15.06.2017 прошел турнир по футболу, участие в котором приняло 8 команд нашего города.',
    "date"=>'2017-08-10');
$sql_event_date = date_create($event[date]);
$event_date = date_format($sql_event_date, 'd');
use app\assets\CalendarAsset;
CalendarAsset::register($this);
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
        <div class="content col-xs-12 col-sm-12 col-md-12 col-lg-9">
            <h1>Календарь спортивных мероприятий</h1>
            <div class="calendar">


                <?php
                foreach ($gov_data as $mkey => $value) { ?>
                    <div class="month <?= ($current_month==$mkey+1) ? 'active_month': 'disable_month'; ?>">
                        <div class="calendar_header h2"><?= $value[month].' '.$yr ?></div>
                        <div class="month_before">
                            <i class="fa fa-angle-left"></i>
                            <?php if($mkey==0) { ?>
                                <a href="<?= Url::to(['/test/calendar/yr='.($yr-1).'/mn=last'])?>">Декабрь <?= $yr-1 ?></a>
                            <? } else { ?>
                                <span class="month_before_button"><?= $gov_data[$mkey-1][month] ?></span>
                            <? } ?>
                        </div>
                        <div class="month_after">
                            <?php if($mkey==11) { ?>
                                <a href="<?= Url::to(['/test/calendar/yr='.($yr+1)])?>">Январь <?= $yr+1 ?></a>
                            <? } else { ?>
                                <span class="month_after_button"><?= $gov_data[$mkey+1][month] ?></span>
                            <? } ?>
                            <i class="fa fa-angle-right"></i>
                        </div>
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
                                    <!--
                                    <?php
                                    $x = date("N", mktime(0, 0, 0, $mkey+1,1, $yr));
                                    if ($x!=1) {
                                        for ($j = 1; $j < $x; $j++) { ?>
                                    --><div class="empty_day"></div><!--
                                        <?php }
                                    }
                                    foreach ($value[days] as $key => $day) { ?>
                                        --><div class="day day_<?= ($day==1)? 'work': 'holiday'?> <?= ($key+1==date('d') && $mkey+1 == date('m'))? 'today': ''?>">
                                                <div class="small_week_title"><?= $week[date("N", mktime(0, 0, 0, $mkey+1,$key+1, $yr))];?></div>
                                                <?php if ($event_date==$key) { ?>
                                                    <div class="small_date_number"><?=$key+1?></div>
                                                    <div class="calendar_event">
                                                        <div title="<?= $event[title] ?>" class="event_link <?= ($event_date<=date('d'))? 'active':'old' ?>"><?= $event[title] ?></div>
                                                        <div class="event_item">
                                                            <div class="event_title"><?= $event[title] ?></div>
                                                            <div class="event_content"><?= $event[content] ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="calendar_event">
                                                        <div title="<?= $event[title] ?>" class="event_link <?= ($event_date<=date('d'))? 'active':'old' ?>">Другое событие</div>
                                                        <div class="event_item">
                                                            <div class="event_title"><?= $event[title] ?></div>
                                                            <div class="event_content"><?= $event[content] ?></div>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="date_number"><?=$key+1?></div>
                                                <?php }?>
                                            </div><!--
                                    <?php }
                                    $x = date("N", mktime(0, 0, 0, $mkey+1,$key+1, $yr));
                                    if ($x!=7) {
                                        for ($k = $x+1; $k <= 7; $k++) { ?>
                                            --><div class="empty_day"></div><!--
                                        <?php }
                                    } ?>
                                    -->
                                </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
