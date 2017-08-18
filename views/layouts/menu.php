<?php
use app\components\CompanyWidget;
use yii\helpers\Url;

?>
<nav class="nav_line">
    <div class="menu_container window col-lg-8 col-md-12">
        <div class="inside_window">
            <div class="close_window">✕</div>
            <div class="h3 window_header">Меню</div>
            <ul class="menu">
                <li>
                    <a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home" aria-hidden="true"></i> Главная</a>
                </li>
                <li
                    <?php
                    if (($this->params['active_page'][0] == 'sportbuilding')||($this->params['active_parent_page'][0] == 'sportbuilding')) { ?>
                        class="active"
                    <?php }
                    ?>
                >
                    <a href="<?= Url::to(['/page/index', 'alias' => 'sportbuilding']) ?>"><i class="fa fa-building" aria-hidden="true"></i>Спортивные
                        сооружения</a>
                    <?= app\components\SubmenuWidget::widget(['tpl' => 'submenu', 'parent_alias' => 'sportbuilding', 'active_submenu' => $this->params['active_page'][0]]); ?>
                </li>
                <li
                    <?php
                    if ($this->params['active_page'][0] == 'news') { ?>
                        class="active"
                    <?php }
                    ?>
                >
                    <a href="<?= Url::to(['/news/index']) ?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        Новости</a>
                </li>
                <li
                    <?php
                    if (($this->params['active_page'][0] == 'about')||($this->params['active_parent_page'][0] == 'about')) { ?>
                        class="active"
                    <?php }
                    ?>
                >
                    <a href="<?= Url::to(['/page/index', 'alias' => 'about']) ?>"><i class="fa fa-users"
                                                                                      aria-hidden="true"></i> О нас</a>
                    <?= app\components\SubmenuWidget::widget(['tpl' => 'submenu', 'parent_alias' => 'about', 'active_submenu' => $this->params['active_page'][0]]); ?>
                </li>
                <li
                    <?php
                    if ($this->params['active_page'][0]=='calendar') { ?>
                        class="active"
                    <?php }
                    ?>
                >
                    <a href="<?= Url::to(['/calendar/index']) ?>"><i class="fa fa-calendar" aria-hidden="true"></i> Календарь мероприятий</a>
                </li>
                <li
                    <?php
                    if ($this->params['active_page'][0]=='contacts') { ?>
                        class="active"
                    <?php }
                    ?>
                >
                    <a href="<?= Url::to(['/site/contacts']) ?>"><i class="fa fa-address-card-o" aria-hidden="true"></i>
                        Контакты</a>
                </li>
                <li
                    <?php
                    if ($this->params['active_page'][0]=='feedback') { ?>
                        class="active"
                    <?php }
                    ?>
                >
                    <a href="<?= Url::to(['/site/ask']) ?>"><i class="fa fa-comments-o" aria-hidden="true"></i>
                        Обратная связь</a>
                    <span class="submenu_expand"></span>
                    <ul class="submenu">
                        <li><a href="<?= Url::to(['/site/ask']) ?>">Задать вопрос</a></li>
                        <li><a href="<?= Url::to(['/site/questionary']) ?>">Анкетирование</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <button type="button" class="navbar-toggle">
        <span class="sr-only">Меню</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <div class="header_contacts col-md-12 col-lg-4">
        <div class="head_phones">
            <span>
                    <?= CompanyWidget::widget(['object' => 'phone']); ?>
            </span>
            <i class="fa fa-phone" aria-hidden="true"></i>
        </div>
        <div>
            <span>
                    <?= CompanyWidget::widget(['object' => 'address']); ?>
            </span>
            <i class="fa fa-map-marker" aria-hidden="true"></i>
        </div>
    </div>
    <?php if (!Yii::$app->user->isGuest) { ?>
        <!--        <div class="container" style="text-align:left">-->
        <!--            <a href="--><? //= \yii\helpers\URL::to(['/admin']) ?><!--" class="btn btn-default">Админ</a>-->
        <!--            <a href="--><? //= \yii\helpers\URL::to(['/site/logout']) ?><!--" class="btn btn-default">Выход</a>-->
        <!--        </div>-->
    <?php } ?>
</nav>