<?php
/**
 * Created by PhpStorm.
 * User: Рустам
 * Date: 03.07.2017
 * Time: 21:43
 */

namespace app\controllers;
use app\models\ContactForm;
use yii\base\Controller;
use Yii;

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

    public function actionContacts()
    {
        $this->layout = 'main';
        return $this->render('contacts');
    }

    public function actionFeedback()
    {
        $this->layout = 'main';
        $model = new ContactForm();
//        $this->setMeta('Контакты '.$company->name, '', 'Контактные данные, адрес и телефон '.$company->name);

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('success', 'Ваше письмо отправлено.');
            Yii::$app->mailer->compose('contact_view', ['model'=>$model])
                ->setFrom(['mr-15@mail.ru' => 'Сайт спортивного комплекса "Талнах"'])
                ->setTo('mr-15@mail.ru')
                ->setSubject('Обратная связь с сайта')
                ->send();
            return $this->refresh();
        }
        // debug($company);
        return $this->render('feedback', compact('model', 'company'));
    }

    public function actionCalendar()
    {
        $yr=Yii::$app->request->get('yr');
        $mn=Yii::$app->request->get('mn');
        $monthes = array("1"=>"Январь","2"=>"Февраль","3"=>"Март","4"=>"Апрель","5"=>"Май", "6"=>"Июнь", "7"=>"Июль","8"=>"Август","9"=>"Сентябрь","10"=>"Октябрь","11"=>"Ноябрь","12"=>"Декабрь");
        $week = array("1"=>"Понедельник","2"=>"Вторник","3"=>"Среда","4"=>"Четверг","5"=>"Пятница", "6"=>"Суббота", "7"=>"Воскресенье");
        if ($mn == 'last') {
            $mn = 12;
        } else if ($mn == 'current') {
            // TODO Перенести в общий файл для общей доступности
            $mn = date("n");
        } else {
            $mn = 1;
        }
        if (!$yr) {
            $yr = date("o");
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
        if ($httpCode==200) {
            $fp = fopen('results.json', 'w');
            fwrite($fp, $json);
            $data = json_decode($json, true);
        } else {
            $data = json_decode(file_get_contents('results.json'), true);
        }
        $new_year_data=[]; $y=0;
            // Формируем массив для текущего года поскольку в $data содержатся все года
            foreach ($data as $year) {
                if ($year["Год/Месяц"] == $yr) {
                    $year_data = $year;
                }
            }
        if ($year_data) {
            foreach ($year_data as $key=>$value) {
                $new_arr='';
                if (strripos(' Январь Февраль Март Апрель Май Июнь Июль Август Сентябрь Октябрь Ноябрь Декабрь ', $key)) {
                    $y++;$new_arr_days='';
                    $value=str_replace("*","",$value);
                    $days = explode(",", $value);

                    $number_days = cal_days_in_month(CAL_GREGORIAN, $y, $yr);
                    for ($i = 1; $i <= $number_days; $i++) {
                        if (in_array($i, $days)) {
                            $new_arr_days[]=0; //выходной день
                        } else {
                            $new_arr_days[]=1; //рабочий день
                        }

                    }
                    $new_arr=array("month"=>$key, "days"=>$new_arr_days);
                }

                if ($new_arr){
                    $new_year_data[]=$new_arr;
                }

            }
        }
        return $this->render('calendar.php', [
            'gov_data' => $new_year_data,
            'current_month' => $mn,
            'yr' => $yr,
            'week' => $week
        ]);
    }
}