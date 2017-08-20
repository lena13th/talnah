<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->params['active_page'][] = 'vacancies';
$this->params['active_parent_page'][] = 'about';
?>
<div class="main_wrapper">
    <ul class="breadcrumbs col-lg-offset-3">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>
            <a href="<?= Url::to(['/page/index', 'alias' => 'about'])?>">
                О нас<!--
         --></a>
        </li>
        <li>
            <a href="<?= Url::to(['/vacancy/index']) ?>">
                Вакансии
            </a>
        </li>
        <li><?= $vacation->title ?></li>
    </ul>
    <div class="main">
        <div class="left main_left col-xs-12 col-md-12 col-lg-3">
            <div class="left_block">
                <div class="left_block_content">
                    <ul class="left_menu">
                        <?php if (!empty($next_pages)): ?>


                            <?php foreach ($next_pages as $next_page): ?>
                                <li
                                    <?php
                                    if ($next_page->alias == 'vacancies') { ?>
                                        class="active"
                                    <?php }
                                    ?>
                                >
                                    <a href="<?= Url::to(['/page/index', 'alias' => $next_page->alias, 'parent_alias' => $next_page->parent_alias, 'grf' => $grf]) ?>"><?= $next_page->title ?></a>
                                </li>

                            <?php endforeach; ?>
                        <?php endif; ?>


                    </ul>
                </div>
            </div>
        </div>
        <div class="content col-xs-12 col-sm-9 col-md-8 col-lg-9">
            <h1 class="h2"><?= $vacation->title ?></h1>
            <?= Yii::$app->session->hasFlash('success')?>
            <?php if(Yii::$app->session->hasFlash('success')) {?>
                <div class="alert-success alert fade in">
                    <p>Ваше письмо отправлено!</p> <p>Спасибо за заявку, в скором времени мы свяжемся с вами.</p>
                </div>
            <?php } elseif(Yii::$app->session->hasFlash('error')) { ?>
                <div class="alert-danger alert order send">
                    <p>Ошибка!</p> <p>В результате отправки возникла ошибка, пожалуйста попробуйте снова.</p>
                </div>
            <?php } ?>
            <p><?= $vacation->content ?></p>
            <div class="h3"><?= $vacation->salary ?> <span class="rub">Р</span></div>

            <div class="upload">
<!--                <div class="h4">Загрузите анкету</div>-->
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'anketa')->fileInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
