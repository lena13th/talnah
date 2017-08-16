<?php

namespace app\controllers;
use app\models\Page;
use app\models\Vacancy;
use Yii;
use yii\caching\DbDependency;

class VacancyController extends AppController
{
    public function actionIndex()
    {
        Yii::$app->cache->flush();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM vacancy',
        ]);
        $vacancy = Yii::$app->db->cache(function ($db) {
            return Vacancy::find()->where(['published' => 1])->all();
        }, 0, $dependency);

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
        $next_pages = Yii::$app->db->cache(function ($db) {
            return Page::find()->where(['published' => 1])->andWhere(['parent_alias' => 'about'])->all();
        }, 0, $dependency);

        $company = $this->getCompany();

        $this->setMeta('Вакансии ' . $company->name, '', 'Вакансии ' . $company->name);
        return $this->render('index', compact('vacancy', 'company','next_pages'));
    }


    public function actionView($id) {
        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
        $next_pages = Yii::$app->db->cache(function ($db) {
            return Page::find()->where(['published' => 1])->andWhere(['parent_alias' => 'about'])->all();
        }, 0, $dependency);

        $vacation = Vacancy::find()->where(['published'=>1])->andWhere(['vacancy_id'=>$id])->one();
        if (empty($vacation)) throw new \yii\web\HttpException(404, 'К сожалению такой вакансии не найдено.');

        $company = $this->getCompany();
        $this->setMeta('Вакансии '.$company->name.', ' .$vacation->title,'', 'Вакансии '.$company->name.', трудоустройство в Плешаново, Красногвардейский район');
        return $this->render('view', compact('vacation','next_pages', 'company'));
    }
}