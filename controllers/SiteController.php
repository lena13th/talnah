<?php

namespace app\controllers;

use app\models\Ads;
use app\models\Events;
use app\models\News;
use app\models\Page;
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
            return News::find()->where(['published' => 1])->limit(5)->all();
        }, 0, $dependency);

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM events',
        ]);
        $events = Yii::$app->db->cache(function ($db) {
            return Events::find()->where(['published' => 1])->all();
        }, 0, $dependency);

        $company = $this->getCompany();
        $this->setMeta('Спортивный комплекс Талнах ', '', 'Контактные данные, адрес и телефон ' . $company->name);

        return $this->render('index', compact('ads', 'company', 'news', 'events'));
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
//                Yii::$app->cache->flush();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
        $sp='sportbuilding';
        $pages = Yii::$app->db->cache(function ($db) use ($sp) {
            return Page::find()->with($sp)->where(['published' => 1])->andWhere(['parent_alias' => $sp])->all();
        }, 0, $dependency);
        $this->setMeta('Контактные данные, адрес и телефон ', '', 'Контактные данные, адрес и телефон ' . $company->name);

        return $this->render('contacts', compact('pages'));
    }


    /**
     * Displays ask page.
     */
    public function actionAsk()
    {
        $model = new ContactForm();
        $company = $this->getCompany();

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->mailer->compose('contact_view', ['model' => $model])
                ->setFrom(['mr-15@mail.ru' => 'Сайт спортивного комплекса Талнах'])
                ->setTo('mr-15@mail.ru')
                ->setSubject('Обратная связь с сайта')
                ->send();
            Yii::$app->session->setFlash('success', 'Ваше письмо отправлено.');
            return $this->refresh();
        }
        $this->setMeta('Задать вопрос ', '', 'Контактные данные, адрес и телефон ' . $company->name);

        return $this->render('ask', compact('model', 'company'));
    }

    /**
     * Displays questionary page.
     */
    public function actionQuestionary()
    {
        $model = new ContactForm();
        $company = $this->getCompany();
        $this->setMeta('Анкетирование ' . $company->name, '', 'Контактные данные, адрес и телефон ' . $company->name);

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->mailer->compose('contact_view', ['model' => $model])
                ->setFrom(['mr-15@mail.ru' => 'Сайт спортивного комплекса Талнах'])
                ->setTo('mr-15@mail.ru')
                ->setSubject('Обратная связь с сайта')
                ->send();
            Yii::$app->session->setFlash('success', 'Ваше письмо отправлено.');
            return $this->refresh();
        }
        return $this->render('questionary', compact('model', 'company'));
//

//        return $this->render('questionary');
    }
    public function actionEvent($id)
    {

        $event = Events::find()->where(['published' => 1])->andWhere(['id' => $id])->one();
        if (empty($event)) throw new \yii\web\HttpException(404, 'К сожалению такого мероприятия не найдено.');

        $company = $this->getCompany();
        $this->setMeta($event->title, '', ' ' . $company->name);
        return $this->render('event', compact('event', 'company'));
    }

}
