<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Page */

$this->title = 'Создание страницы';
$this->params['breadcrumbs'][] = ['label' => 'Страницы раздела', 'url' => ['index','parent_alias'=>$parent_alias]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'parent_alias'=>$parent_alias,
    ]) ?>

</div>
