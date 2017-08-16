<?php

namespace app\controllers;

use app\models\News;
use Yii;
use yii\caching\DbDependency;

class NewsController extends AppController
{
    public function actionIndex()
    {
//        Yii::$app->cache->flush();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM news',
        ]);
        $news = Yii::$app->db->cache(function ($db) {
            return News::find()->where(['published' => 1])->all();
        }, 0, $dependency);

        $company = $this->getCompany();

        $this->setMeta('Новости ' . $company->name, '', 'Новости ' . $company->name);
        return $this->render('index', compact('news', 'company'));
    }

    public function actionView($id)
    {

        $news = News::find()->where(['published' => 1])->andWhere(['news_id' => $id])->one();
        if (empty($news)) throw new \yii\web\HttpException(404, 'К сожалению такой новости не найдено.');

        $company = $this->getCompany();
        $this->setMeta('Новости ' . $company->name . ', ' . $news->title, '', 'Новости ' . $company->name);
        return $this->render('view', compact('news', 'company'));
    }
}