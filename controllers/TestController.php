<?php
/**
 * Created by PhpStorm.
 * User: Рустам
 * Date: 03.07.2017
 * Time: 21:43
 */

namespace app\controllers;
use yii\base\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'index_layout';
        return $this->render('index');
    }
}