<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Sportbuilding;
use Yii;
use app\modules\admin\models\Page;
use app\modules\admin\models\PageSearch;
use app\modules\admin\controllers\AppAdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends AppAdminController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex($parent_alias,$grf=null)
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $parent_alias);
        $grf='sportbuilding';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'grf'=>$grf,
            'parent_alias'=>$parent_alias,
        ]);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id,$grf=null)
    {
        return $this->render('view', [
            'model' => $this->findModel($id,$grf), 'grf'=>$grf
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($parent_alias=null,$grf=null)
    {
        $model = new Page();
        if ($model->load(Yii::$app->request->post()) ) {
            $model->parent_alias=$parent_alias;
            $model->save();
            return $this->redirect(['view', 'id' => $model->page_id]);
        } else {
            return $this->render('create', [
                'model' => $model, 'parent_alias'=>$parent_alias,'grf'=>$grf,
            ]);
        }
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$grf=null,$alias=null)
    {
        $model = $this->findModel($id);
//        $model->load(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            if ($grf=='sportbuilding'){
                $modelsportb = $this->findModelSportb($alias);
                $modelsportb->load(Yii::$app->request->post())->sportbuilding;
                $modelsportb->save();
            }
            $this->redirect(['view', 'id' => $model->page_id,'grf'=>$grf]);
        } else {
            return $this->render('update', [
                'model' => $model,'grf'=>$grf,
            ]);
        }
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/admin']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id,$grf=null)
    {
        if ($grf=='sportbuilding'){
            $model = Page::find()->with('sportbuilding')->where(['page_id' => $id])->one();
        } else{
//            $model = Page::find()->where('alias != :alias', ['alias'=>'vacancy'])->one();

            $model = Page::findOne($id);
        }
        if (($model) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModelSportb($alias)
    {
        $modelsportb = Sportbuilding::find()->where(['alias' => $alias])->one();

        if (($modelsportb) !== null) {
            return $modelsportb;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
