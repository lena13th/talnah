<?php

namespace app\components;

use app\modules\admin\models\Sportbuilding;
use yii\base\Widget;
use Yii;
use yii\caching\DbDependency;
use yii\data\Pagination;

class Sportb extends Widget
{

    public $tpl;
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

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM sportbuilding',
        ]);

        $sportb = Yii::$app->db->cache(function ($db) {
            return Sportbuilding::find()->all();
        }, 60, $dependency);

        return $this->render($this->tpl, compact('sportb'));
    }
}