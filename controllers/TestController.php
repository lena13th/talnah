<?php
/**
 * Created by PhpStorm.
 * User: Рустам
 * Date: 03.07.2017
 * Time: 21:43
 */

namespace app\controllers;
use yii\base\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'index_layout';
        return $this->render('index');
    }

    public function actionBuildings()
    {
        $this->layout = 'main';
        return $this->render('buildings');
    }

    public function actionNews()
    {
        $this->layout = 'main';
        return $this->render('news');
    }

    public function actionNews_1()
    {
        $this->layout = 'main';
        return $this->render('news_1');
    }

    public function actionCalendar()
    {
        $this->layout = 'main';

        // TODO Перенести в общий файл для общей доступности
        $monthes = array("1"=>"Январь","2"=>"Февраль","3"=>"Март","4"=>"Апрель","5"=>"Май", "6"=>"Июнь", "7"=>"Июль","8"=>"Август","9"=>"Сентябрь","10"=>"Октябрь","11"=>"Ноябрь","12"=>"Декабрь");
        $current_month = $monthes[date("n")];

        // Получаем от гос данных календарь в JSON формате
        $json = file_get_contents('http://data.gov.ru/api/json/dataset/7708660670-proizvcalendar/version/20151123T183036/content/?access_token=a095f9d1a8ea1802e0d349283e7db79b');

        // Преобразуем к ассоциативному массиву
        $data = json_decode($json, true);

        // Формируем массив для текущего года поскольку в $data содержатся все года
        foreach ($data as $year) {
            if ($year["Год/Месяц"] == "2017") {
                $year_data = $year;
            }
        }
        return $this->render('calendar.php', [
            'gov_data' => $year_data,
            'current_month' => $current_month
        ]);
    }
}