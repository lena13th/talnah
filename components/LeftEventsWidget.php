<?php

namespace app\components;

use app\models\Events;
use app\models\News;
use yii\base\Widget;
use app\models\Page;
use Yii;
use yii\caching\DbDependency;
use yii\data\Pagination;

class LeftEventsWidget extends Widget
{

    public $tpl;
    public $yr;
//    public $active_submenu;
//    public $model; /* Нужно для админки - передаем значение текущего экземпляра модели. проще говоря - запись категории на странице которой мы находимся */
//	public $tree; /* Результат работы функции - из массива строится дерево со вложенностью */
//	public $menuHtml; /* Готовый HTML код в зависимости от шаблона */
//	public $xxx; /* Готовый HTML код в зависимости от шаблона */


    public function init()
    {
        parent::init();
        $this->tpl .= '.php';

    }

    public function run()
    {
//                Yii::$app->cache->flush();
        $yr = $this->yr;

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM events',
        ]);

        $query = Events::find()->where(['published' => 1]);

        // Инициируем пагинацию
        $pages = new Pagination([
            'totalCount'=>$query->count(),
            'pageSize'=>4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);

        $events = Yii::$app->db->cache(function ($db) use ($pages, $query) {
            return $query->offset($pages->offset)->limit($pages->limit)->with('news')->all();
        }, 0, $dependency);

        $date_news = '';
        foreach ($events as $key => $event) {
            $sql_event_date = date_create($event->date_event_start);

            $event_date_d = date_format($sql_event_date, 'd');
            $event_date_m = date_format($sql_event_date, 'm');
            $event_date_y = date_format($sql_event_date, 'Y');


            if ($event_date_y < date("Y")) {
                $date_news[$event_date_y][]=$event->news;
            }elseif ($event_date_y = date("Y")) {
                if ($event_date_m < date("m")) {
                    $date_news[$event_date_y][]=$event->news;
                }elseif ($event_date_m = date("m")){
                    if ($event_date_d <= date("d")) {
                        $date_news[$event_date_y][]=$event->news;
                    }
            }}
        }

        return $this->render($this->tpl, compact('date_news','yr','pages'));
    }
}