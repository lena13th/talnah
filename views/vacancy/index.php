<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['active_page'][] = 'vacancies';
$this->params['active_parent_page'][] = 'about';
?>
<div class="main_wrapper vacancy">
    <ul class="breadcrumbs col-lg-offset-3">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>
            <a href="<?= Url::to(['/page/index', 'alias' => 'about']) ?>">О нас</a>
        </li>
        <li>Вакансии</li>
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
            <h1>Вакансии</h1>
            <?php $vacancy=[]; if( !empty($vacancy) ): ?>
                <?php foreach ($vacancy as $vacation): ?>

                    <div class="vacancy_item col-xs-12 col-sm-6 col-md-4 col-lg-4 vacation">
                        <div class="vacation_block">
                            <h3><?= $vacation->title?></h3>
                            <p><?= $vacation->short_description?></p>
                            <div class="h3"><?= $vacation->salary?> <span class="rub">Р</span></div>
                            <div class="caption">
                                <div class="prod_list_item_buttons">
                                    <a href="<?= Url::to(['/vacancy/view', 'id'=>$vacation->vacancy_id]) ?>" class="btn btn-default" role="button">Ознакомиться с вакансией</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php else: ?>
                <div class="empty_content empty_left">
                    <div class="h2">Вакансий не найдено</div>
                    <p>К сожалению на данный момент на сайте нет опубликованных вакансий.</p>
                    <a class="btn  btn-default" href="<?= Url::to(['/site/index']) ?>"><span>Вернуться на главную</span></a>
                </div>
            <?php endif; ?>

        </div>
    </div>

</div>
