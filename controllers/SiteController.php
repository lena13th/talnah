<?php

namespace app\controllers;

use app\models\Ads;
use app\models\Events;
use app\models\News;
use app\models\Page;
use app\models\Questionary;
use app\models\QuestionaryForm;
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
//        Yii::$app->cache->flush();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM ads',
        ]);
        $ads = Yii::$app->db->cache(function ($db) {
            return Ads::find()->where(['published' => 1])->all();
        }, 60, $dependency);

        $dependency1 = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM news',
        ]);
        $news = Yii::$app->db->cache(function ($db) {
            return News::find()->where(['published' => 1])->orderBy(['date_public' => SORT_DESC])->limit(5)->all();
        }, 60, $dependency1);

        $dependency2 = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM events',
        ]);
        $events = Yii::$app->db->cache(function ($db) {
            return Events::find()->where(['published' => 1])
                ->andWhere(['>=', 'date_event_start', date('Y-m-d')])->limit(5)->orderBy('date_event_start')
            ->all();
        }, 60, $dependency2);

        $this->setMeta('Спортивный комплекс Талнах ', '', 'Контактные данные, адрес и телефон ' . $company->name);
        $company = $this->getCompany();

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
        $company = $this->getCompany();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
        $sp='sportbuilding';
        $pages = Yii::$app->db->cache(function ($db) use ($sp) {
            return Page::find()->with($sp)->where(['published' => 1])->andWhere(['parent_alias' => $sp])->all();
        }, 0, $dependency);
        $this->setMeta('Контактные данные, адрес и телефон ', '', 'Контактные данные, адрес и телефон ' . $company->name);

        return $this->render('contacts', compact('pages', 'company'));
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
                ->setFrom(['sportkompleks17@mail.ru' => 'Сайт спортивного комплекса Талнах'])
                ->setTo('sportkompleks17@mail.ru')
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
        $model = new QuestionaryForm();
        $company = $this->getCompany();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM questionary',
        ]);
        $questionary = Yii::$app->db->cache(function ($db) {
            return Questionary::find()->where(['published' => 1])->all();
        }, 0, $dependency);

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->mailer->compose('questionary_view', ['model' => $model,'questionary'=>$questionary])
                ->setFrom(['sportkompleks17@mail.ru' => 'Сайт спортивного комплекса Талнах'])
                ->setTo('sportkompleks17@mail.ru')
                ->setSubject('Анкетирование')
                ->send();
            Yii::$app->session->setFlash('success', 'Ваше письмо отправлено.');
            return $this->refresh();
        }

        $this->setMeta('Анкетирование ' . $company->name, '', 'Контактные данные, адрес и телефон ' . $company->name);

        return $this->render('questionary', compact('model', 'company','questionary','questionaryform'));
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
