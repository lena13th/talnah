<?php
use yii\helpers\Url;
$days = 31;
$before = 3;

//$event = array("title"=>'Результаты турнира по футболу',
//    "content"=>'15.06.2017 прошел турнир по футболу, участие в котором приняло 8 команд нашего города.',
//    "date"=>'2017-08-10');
//$sql_event_date = date_create($event[date]);
//$event_date = date_format($sql_event_date, 'd');
use app\assets\CalendarAsset;
CalendarAsset::register($this);

$this->params['active_page'][] = 'calendar';
?>

<div class="main_wrapper">
    <ul class="breadcrumbs col-lg-offset-3">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>Календарь спортивных мероприятий</li>
    </ul>

    <?php
//    echo '<pre>';
//    print_r($date_news);
//echo '</pre>';

//    ?>

    <div class="main">
        <div class="left main_left col-xs-12 col-md-12 col-lg-3">
            <?= app\components\LeftEventsWidget::Widget(['tpl' => 'leftmenu_events','yr'=>'null']); ?>

        </div>
        <div class="content col-xs-12 col-sm-12 col-md-12 col-lg-9">
            <h1>Календарь спортивных мероприятий</h1>
<!--            --><?php //if ($gov_data) { ?>
            <?php if ($gov_data) { ?>
                <div class="calendar" style="overflow: visible;">
                    <?php
                    foreach ($gov_data as $mkey => $value) { ?>
                        <div class="month <?= ($current_month==$mkey+1) ? 'active_month': 'disable_month'; ?>">
                            <div class="calendar_header h2"><?= $value[month].' '.$yr ?></div>
                            <div class="month_before">
                                <?php if($mkey==0) { ?>
                                    <a href="<?= Url::to(['/calendar/index', 'yr' => $yr-1,'mn'=>'11']) ?>"><i class="fa fa-angle-left"></i>Декабрь <?= $yr-1 ?></a>
                                <? } else { ?>
                                <a href="<?= Url::to(['/calendar/index', 'yr' => $yr,'mn'=>$current_month-1]) ?>"><i class="fa fa-angle-left"></i><?= $gov_data[$mkey-1][month] ?></a>
                                <? } ?>
                            </div>
                            <div class="month_after">
                                <?php if($mkey==11) { ?>
                                    <a href="<?= Url::to(['/calendar/index', 'yr' => $yr+1,'mn'=>'0']) ?>">Январь <?= $yr+1 ?><i class="fa fa-angle-right"></i></a>

                                <? } else { ?>
                                    <a href="<?= Url::to(['/calendar/index', 'yr' => $yr,'mn'=>$current_month+1]) ?>"><?= $gov_data[$mkey+1][month] ?><i class="fa fa-angle-right"></i></a>
                                <? } ?>
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
<!--                                                    --><?php //if ($event_date==$key) { ?>
                                                    <?php
                                                    $date_event=$date_events[$key+1];
                                                    if (!empty($date_event[0])) { ?>

                                                        <div class="small_date_number"><?= $key + 1 ?></div>
                                                        <div class="calendar_event">
                                                            <div title="<?= $date_event[0]->title ?>"
                                                                 class="event_link <?= (($key+1 > date('d'))&&($current_month>=date('m'))) ? 'active' : 'old' ?>"><?= $date_event[0]->title ?></div>
                                                            <!--                                                            <div title="-->
                                                            <?//= $event[title]
                                                            ?><!--" class="event_link -->
                                                            <?//= ($event_date<=date('d'))? 'active':'old'
                                                            ?><!--">--><?//= $event[title]
                                                            ?><!--</div>-->
                                                            <div class="event_item">
                                                                <div class="event_title">
                                                                    <?php if(($key+1 > date('d'))&&($current_month>=date('m'))) { ?>
                                                                    <a href="<?= Url::to(['/site/event', 'id'=>$date_event[0]->id]) ?>">
                                                                                <?php
                                                                                }else{
                                                                                ?>
                                                                        <a href="<?= Url::to(['/news/view', 'id'=>$date_event[0]->id]) ?>">
                                                                            <?php
                                                                            }
                                                                            ?>


                                                                            <?= $date_event[0]->title ?></a></div>
                                                                <div class="event_content"><?= $date_event[0]->short_description ?></div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if (!empty($date_event[1])) { ?>


                                                            <div class="calendar_event">
                                                                <div title="<?= $date_event[1]->title ?>"
                                                                     class="event_link <?= (($key+1 > date('d'))&&($current_month>=date('m'))) ? 'active' : 'old' ?>">
                                                                    Другое событие
                                                                </div>
                                                                <div class="event_item">
                                                                    <div class="event_title"><a href="<?= Url::to(['/site/event', 'id'=>$date_event[1]->id]) ?>"> <?= $date_event[1]->title ?></a></div>
                                                                    <div class="event_content"><?= $date_event[1]->short_description ?></div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
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
            <?php } else { ?>
                <div class="h3"> К сожалению по данной дате ничего не найдено </div>
            <?php } ?>
        </div>
    </div>
</div>
