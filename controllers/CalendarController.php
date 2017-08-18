<?php

namespace app\controllers;

use app\models\Events;
use app\models\News;
use Yii;
use yii\caching\DbDependency;

class CalendarController extends AppController
{
    public function actionIndex($event = null, $yr = null, $mn = null)
    {
//        $yr=Yii::$app->request->get('yr');
//        $mn=Yii::$app->request->get('mn');
//        $monthes = array("1"=>"Январь","2"=>"Февраль","3"=>"Март","4"=>"Апрель","5"=>"Май", "6"=>"Июнь", "7"=>"Июль","8"=>"Август","9"=>"Сентябрь","10"=>"Октябрь","11"=>"Ноябрь","12"=>"Декабрь");
        $week = array("1" => "Понедельник", "2" => "Вторник", "3" => "Среда", "4" => "Четверг", "5" => "Пятница", "6" => "Суббота", "7" => "Воскресенье");
//        if ($mn == 'last') {
//            $mn = 12;
//        } else if ($mn == 'current') {
//            $mn = date("n");
//        } else {
//            $mn = 1;
//        }
        if (!$yr) {
            $yr = date("o");
        }
        if (!$mn) {
            if ($yr == date("o")){
                $mn = date("n");
            }else{
                $mn = 1;
            }
        }
//        $yr=2017;
        $this->layout = 'main';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://data.gov.ru/api/json/dataset/7708660670-proizvcalendar/version/20151123T183036/content/?access_token=a095f9d1a8ea1802e0d349283e7db79b");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Получаем от гос данных календарь в JSON формате
//        $json = file_get_contents('http://dat3a.gov.ru/api/json/dataset/7708660670-proizvcalendar/version/20151123T183036/content/?access_token=a095f9d1a8ea1802e0d349283e7db79b');
        // Преобразуем к ассоциативному массиву
        if ($httpCode == 200) {
            $fp = fopen('results.json', 'w');
            fwrite($fp, $json);
            $data = json_decode($json, true);
        } else {
            $data = json_decode(file_get_contents('results.json'), true);
        }
        $new_year_data = [];
        $y = 0;
        // Формируем массив для текущего года поскольку в $data содержатся все года
        foreach ($data as $year) {
            if ($year["Год/Месяц"] == $yr) {
                $year_data = $year;
            }
        }
        if ($year_data) {
            foreach ($year_data as $key => $value) {
                $new_arr = '';
                if (strripos(' Январь Февраль Март Апрель Май Июнь Июль Август Сентябрь Октябрь Ноябрь Декабрь ', $key)) {
                    $y++;
                    $new_arr_days = '';
                    $value = str_replace("*", "", $value);
                    $days = explode(",", $value);

                    $number_days = cal_days_in_month(CAL_GREGORIAN, $y, $yr);
                    for ($i = 1; $i <= $number_days; $i++) {
                        if (in_array($i, $days)) {
                            $new_arr_days[] = 0; //выходной день
                        } else {
                            $new_arr_days[] = 1; //рабочий день
                        }

                    }
                    $new_arr = array("month" => $key, "days" => $new_arr_days);
                }

                if ($new_arr) {
                    $new_year_data[] = $new_arr;
                }

            }
        }

        Yii::$app->cache->flush();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM events',
        ]);

        $events = Yii::$app->db->cache(function ($db) {
            return Events::find()->with('news')->where(['published' => 1])->all();
        }, 0, $dependency);

        $date_events = '';
        $date_news = '';
        foreach ($events as $key => $event) {
            $sql_event_date = date_create($event->date_event_start);

            $event_date_d = date_format($sql_event_date, 'd');
            $event_date_m = date_format($sql_event_date, 'm');
            $event_date_y = date_format($sql_event_date, 'Y');
            if (($event_date_y == $yr) && ($event_date_m == $mn)) {
                if (strtotime($event->date_event_start) > strtotime(date("Y-m-d"))) {
                    $date_events[(int)$event_date_d][] = $event;
                } else {
                    $date_events[(int)$event_date_d][] = $event->news;
                }
            }
        }
        $this->setMeta('Календарь ', '', 'календарь ');

        return $this->render('index.php', [
            'gov_data' => $new_year_data,
            'current_month' => $mn,
            'yr' => $yr,
            'week' => $week,
            'events' => $events,
            'date_events' => $date_events,
            'date_news' => $date_news
        ]);
    }


    public function actionView($yr)
    {
        $this->setMeta('Отчет о проведенных мероприятиях в '.$yr.' году', '', 'отчет ');

        return $this->render('view', compact('yr', 'company'));
    }

}