<?php
use yii\helpers\Url;
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
    echo '<pre>';
//    print_r($dd);
echo '</pre>';

//    ?>

    <div class="main">
        <div class="left main_left col-xs-12 col-md-12 col-lg-3">
            <?= app\components\LeftEventsWidget::Widget(['tpl' => 'leftmenu_events','yr'=>'null']); ?>

        </div>
        <div class="content col-xs-12 col-sm-12 col-md-12 col-lg-9">
            <h1>Календарь спортивных мероприятий</h1>

            <?php if ($date_events) { ?>
                <div class="calendar" style="overflow: visible;">
                        <div class="month active_month">
                            <div class="calendar_header h2"><?= $months[$current_month].' '.$yr ?></div>
                            <div class="month_before">
                                <?php if($current_month==1) { ?>
                                    <a href="<?= Url::to(['/calendar/index', 'yr' => $yr-1,'mn'=>'12']) ?>"><i class="fa fa-angle-left"></i>Декабрь <?= $yr-1 ?></a>
                                <? } else { ?>
                                <a href="<?= Url::to(['/calendar/index', 'yr' => $yr,'mn'=>$current_month-1]) ?>"><i class="fa fa-angle-left"></i><?= $months[$current_month-1] ?></a>
                                <? } ?>
                            </div>
                            <div class="month_after">
                                <?php if($current_month==12) { ?>
                                    <a href="<?= Url::to(['/calendar/index', 'yr' => $yr+1,'mn'=>'1']) ?>">Январь <?= $yr+1 ?><i class="fa fa-angle-right"></i></a>

                                <? } else { ?>
                                    <a href="<?= Url::to(['/calendar/index', 'yr' => $yr,'mn'=>$current_month+1]) ?>"><?= $months[$current_month+1] ?><i class="fa fa-angle-right"></i></a>
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
                                        $x = date("N", mktime(0, 0, 0, $current_month,1, $yr));
                                        if ($x!=1) {
                                            for ($j = 1; $j < $x; $j++) { ?>
                                        --><div class="empty_day"></div><!--
                                            <?php }
                                        }

                                        foreach ($date_events as $key => $days) { ?>
                                            --><div class="day day_work <?= ($key+1==date('d') && $current_month == date('m'))? 'today': ''?>">
                                                    <div class="small_week_title"><?= $week[date("N", mktime(0, 0, 0, $current_month,$key+1, $yr))];?></div>
<!--                                                    --><?php //if ($event_date==$key) { ?>
                                                    <?php
//                                                    $date_event=$date_events[$key+1];
                                                    if (!empty($days)) { ?>

                                                        <div class="small_date_number"><?= $key + 1 ?></div>
                                                        <?php foreach ($days as $key1 => $day) { ?>
                                                        <div class="calendar_event">
                                                            <div title="<?= $day->title ?>"
                                                                 class="event_link <?= (($key+1 > date('d'))&&($current_month>=date('m'))) ? 'active' : 'old' ?>"><?= $day->title ?></div>
                                                            <div class="event_item">
                                                                <div class="event_title">
                                                                    <?php if(($key+1 > date('d'))&&($current_month>=date('m'))) { ?>
                                                                    <a href="<?= Url::to(['/site/event', 'id'=>$day->id]) ?>">
                                                                                <?php
                                                                                }else{
                                                                                ?>
                                                                        <a href="<?= Url::to(['/news/view', 'id'=>$day->id]) ?>">
                                                                            <?php
                                                                            }
                                                                            ?>


                                                                            <?= $day->title ?></a></div>
                                                                <div class="event_content"><?= $day->short_description ?></div>
                                                            </div>
                                                        </div>
                                                            <?php }   ?>

                                                    <?php } else { ?>
                                                        <div class="date_number"><?=$key+1?></div>
                                                    <?php }?>
                                                </div><!--
                                        <?php }
                                        $dd=count($date_events);
                                        $x  = date("N", mktime(0, 0, 0, $current_month,$dd, $yr));
                                        if ($x!=7) {
                                            for ($k = $x+1; $k <= 7; $k++) { ?>
                                                --><div class="empty_day"></div><!--
                                            <?php }
                                        } ?>
                                        -->
                                    </div>
                            </div>
                        </div>
                </div>
            <?php } else { ?>
                <div class="h3"> К сожалению по данной дате ничего не найдено </div>
            <?php } ?>
        </div>
    </div>
</div>
