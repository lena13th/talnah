<?php

namespace app\controllers;

use app\models\Page;
use app\models\Sportbuilding;
use Yii;
use yii\caching\DbDependency;

class PageController extends AppController
{

    public function actionIndex($alias, $parent_alias = null, $grf = null)
    {
        $company = $this->getCompany();
        if (!empty($parent_alias)){
            $page = Page::find()->where(['published' => 1])->andWhere(['alias' => $alias])->andWhere(['parent_alias' => $parent_alias])->one();
        } else {
            if ($alias=='sportbuilding'){
                $page->title = 'Спортивные сооружения';
                $page->content = $company->sportbuilding;
                $page->alias=$alias;
            }
            elseif ($alias=='about'){
                $page->title = 'О нас';
                $page->content = $company->about_company;
                $page->alias=$alias;

            }
            else {
                $page = Page::find()->where(['published' => 1])->andWhere(['alias' => $alias])->one();
            }
        }
        if (empty($page)) {
            throw new \yii\web\HttpException(404, 'К сожалению такой страницы не найдено.');
        }

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
        if ((!empty($parent_alias))&&($parent_alias!='0')) {
            $parent_page = Yii::$app->db->cache(function ($db) use ($parent_alias) {
                return Page::find()->where(['published' => 1])->andWhere(['alias' => $parent_alias])->one();
            }, 0, $dependency);
        }
        $child_pages = Yii::$app->db->cache(function ($db) use ($alias) {
            return Page::find()->where(['published' => 1])->andWhere(['parent_alias' => $alias])->all();
        }, 0, $dependency);
        if (empty($child_pages)){
            $next_pages = Yii::$app->db->cache(function ($db) use ($page) {
                return Page::find()->where(['published' => 1])->andWhere(['parent_alias' => $page->parent_alias])->all();
            }, 0, $dependency);
        }
        $this->setMeta($page->title, '', '-- ' . $company->name);

//        return $this->render('index', compact('page', 'next_pages','child_pages','parent_page', 'company', 'grf'));
        return $this->render('index', compact('page', 'next_pages','child_pages','parent_page', 'company', 'grf','alias'));
    }

    public function actionContacts($parent_alias, $grf)
    {
        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
//        if ((!empty($parent_alias))&&($parent_alias!='0')) {
            $parent_page = Yii::$app->db->cache(function ($db) use ($parent_alias) {
                return Page::find()->where(['published' => 1])->andWhere(['alias' => $parent_alias])->one();
            }, 0, $dependency);
//        }
        $next_pages = Yii::$app->db->cache(function ($db) use ($parent_alias) {
            return Page::find()->where(['published' => 1])->andWhere(['parent_alias' => $parent_alias])->all();
        }, 0, $dependency);
        $dependency1 = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM sportbuilding',
        ]);
        $page = Yii::$app->db->cache(function ($db) use ($parent_alias) {
            return Sportbuilding::find()->andWhere(['alias' => $parent_alias])->one();
        }, 0, $dependency);
        $this->setMeta('Контакты '.$parent_page->title, '', '-- ' . $company->name);

        return $this->render('contacts', compact('parent_alias','parent_page','page','next_pages','grf'));

    }



    }