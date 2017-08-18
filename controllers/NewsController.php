<?php

namespace app\controllers;

use app\models\News;
use Yii;
use yii\caching\DbDependency;
use yii\data\Pagination;

class NewsController extends AppController
{
    public function actionIndex()
    {
//        Yii::$app->cache->flush();
        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM news',
        ]);

        $query = News::find()->where(['published' => 1]);

        // Инициируем пагинацию
        $pages = new Pagination([
            'totalCount'=>$query->count(),
            'pageSize'=>4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);

        $news = Yii::$app->db->cache(function ($db) use ($pages, $query) {
            return $query->offset($pages->offset)->limit($pages->limit)->all();
        }, 0, $dependency);

        $company = $this->getCompany();

        $this->setMeta('Новости ', '', 'Новости ');
        return $this->render('index', compact('news', 'company','pages'));
    }

    public function actionView($id)
    {

        $news = News::find()->where(['published' => 1])->andWhere(['id' => $id])->one();
        if (empty($news)) throw new \yii\web\HttpException(404, 'К сожалению такой новости не найдено.');

        $company = $this->getCompany();
        $this->setMeta($news->title, '', 'Новости ');
        return $this->render('view', compact('news', 'company'));
    }
}