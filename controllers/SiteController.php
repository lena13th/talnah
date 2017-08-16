<?php

namespace app\controllers;

use app\models\Ads;
use app\models\Events;
use app\models\News;
use app\models\Sportbuilding;
use Yii;
use yii\caching\DbDependency;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends AppController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'index_layout';

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM ads',
        ]);
        $ads = Yii::$app->db->cache(function ($db) {
            return Ads::find()->where(['published' => 1])->all();
        }, 0, $dependency);

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM news',
        ]);
        $news = Yii::$app->db->cache(function ($db) {
            return News::find()->where(['published' => 1])->all();
        }, 0, $dependency);

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM events',
        ]);
        $events = Yii::$app->db->cache(function ($db) {
            return Events::find()->where(['published' => 1])->all();
        }, 0, $dependency);

        $company = $this->getCompany();

        return $this->render('index', compact('ads','company','news','events'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



    /**
     * Displays contacts page.
     */
    public function actionContacts()
    {
        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
        $sportbuildings = Yii::$app->db->cache(function ($db)  {
            return Sportbuilding::find()->where(['published' => 1])->all();
        }, 0, $dependency);

        return $this->render('contacts',compact('sportbuildings'));
    }


    /**
     * Displays ask page.
     */
    public function actionAsk()
    {
        return $this->render('ask');
    }

    /**
     * Displays questionary page.
     */
    public function actionQuestionary()
    {
        return $this->render('questionary');
    }

}
