<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="main_wrapper">
    <ul class="breadcrumbs col-lg-offset-3">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
            <li><a href="<?= Url::to(['/page/index', 'alias' => 'sportbuilding']) ?>">Спортивные
                    сооружения</a></li>
        <?php
        if (!empty($parent_page)) {
            ?>
            <li>
                <a href="<?= Url::to(['/page/index', 'alias' => $parent_page->alias]) ?>">
                    <?= $parent_page->title ?><!--
            --></a>
            </li>

            <?php
        }
        ?>
        <li>Контакты</li>
    </ul>
        <?php
            $this->params['active_parent_page'][] = $grf;
            $this->params['active_page'][] = $parent_page->alias;
        ?>
        <div class="main">
            <div class="left main_left col-xs-12 col-md-12 col-lg-3">
                <div class="left_block">
                    <div class="left_block_content">
                        <ul class="left_menu">
                                <?php foreach ($next_pages as $next_page): ?>
                                    <li
                                        <?php
                                        if ($next_page->alias == 'contacts') { ?>
                                            class="active"
                                        <?php }
                                        ?>
                                    >
                                        <?php
                                        if ($next_page->alias == 'contacts'):
                                            ?>
                                            <a href="<?= Url::to(['/page/contacts', 'parent_alias' => $next_page->parent_alias, 'grf' => $grf]) ?>"><?= $next_page->title ?></a>
                                        <?php else: ?>
                                            <a href="<?= Url::to(['/page/index', 'alias' => $next_page->alias, 'parent_alias' => $next_page->parent_alias, 'grf' => $grf]) ?>"><?= $next_page->title ?></a>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content build_contacts col-xs-12 col-sm-9 col-md-8 col-lg-9">
                <h1>Контакты</h1>
                <br>
                <div class="info col-xs-12">
                    <div class="phones col-xs-12 col-sm-3">
                        <h4>Телефон</h4>
                        <?= $page->phone ?>
                    </div>
                    <div class="adress col-xs-12 col-sm-5">
                        <h4>Адрес</h4>
                        <?= $page->address ?>
                    </div>
                    <div class="worktime col-xs-12 col-sm-4">
                        <h4>Режим работы</h4>
                        <?= $page->work_hours ?>
                    </div>
                </div>
                <div>

                </div>

            </div>
        </div>

</div>
