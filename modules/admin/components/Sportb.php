<?php

namespace app\modules\admin\components;

use app\modules\admin\models\Page;
use yii\base\Widget;
use Yii;
use yii\caching\DbDependency;

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
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);

        $sportbs = Yii::$app->db->cache(function ($db) {
            return Page::find()->where(['parent_alias'=>'sportbuilding'])->all();
        }, 60, $dependency);

        return $this->render('sportb', compact('sportbs'));
    }
}