<?php

namespace app\components;

use yii\base\Widget;
use app\models\Page;
use Yii;
use yii\caching\DbDependency;

class SubmenuWidget extends Widget
{

    public $tpl;
    public $parent_alias;
    public $active_submenu;
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
        $active_submenu = $this->active_submenu;
        $parent_alias = $this->parent_alias;

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
        $child_pages = Yii::$app->db->cache(function ($db) {
            return Page::find()->where(['published' => 1])->andWhere(['parent_alias' => $this->parent_alias])->all();
        }, 0, $dependency);
        return $this->render($this->tpl, compact('page', 'child_pages', 'parent_alias', 'active_submenu'));
    }
}