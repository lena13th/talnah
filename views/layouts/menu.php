<?php
use yii\helpers\Url;

?>
<nav class="nav_line">
    <div class="menu_container window col-lg-8 col-md-12">
        <div class="inside_window">
        <div class="close_window">✕</div>
        <div class="h3 window_header">Меню</div>
        <ul class="menu">
            <li><a href="<?= Url::to(['/test/index'])?>"><i class="fa fa-home" aria-hidden="true"></i> Главная</a></li>
            <li class="<?php if ((Yii::$app->controller->action->id)=='buildings') {?>active<? } ?>">
                <a href="<?= Url::to(['/test/buildings'])?>"><i class="fa fa-building" aria-hidden="true"></i>Спортивные сооружения</a>
                <span class="submenu_expand"></span>
                <ul class="submenu">
                    <li><a href="<?= Url::to(['/test/buildings'])?>">СОЦ “Восток”</a></li>
                    <li><a href="<?= Url::to(['/test/buildings'])?>">КОЦ</a></li>
                    <li><a href="<?= Url::to(['/test/buildings'])?>">Плавательный бассейн</a></li>
                    <li><a href="<?= Url::to(['/test/buildings'])?>">СЗ “Горняк”</a></li>
                    <li><a href="<?= Url::to(['/test/buildings'])?>">КК “Умка”</a></li>
                    <li><a href="<?= Url::to(['/test/buildings'])?>">СТК “Гора Отдельная”</a></li>
                </ul>
            </li>
            <li class="<?php if ((Yii::$app->controller->action->id)=='news') {?>active<? } ?>">
                <a href="<?= Url::to(['/test/news'])?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Новости</a>
            </li>
            <li class="<?php if ((Yii::$app->controller->action->id)=='about') {?>active<? } ?>">
                <a href="#"><i class="fa fa-users" aria-hidden="true"></i> О нас</a>
            </li>
            <li class="<?php if ((Yii::$app->controller->action->id)=='calendar') {?>active<? } ?>">
                <a href="<?= Url::to(['/test/calendar/yr='.date("o").'/mn=current'])?>"><i class="fa fa-calendar" aria-hidden="true"></i> Календарь мероприятий</a>
            </li>
            <li class="<?php if ((Yii::$app->controller->action->id)=='contacts') {?>active<? } ?>">
                <a href="<?= Url::to(['/test/contacts'])?>"><i class="fa fa-address-card-o" aria-hidden="true"></i>Контакты</a>
            </li>
            <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> Обратная связь</a></li>
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
                <p>+7 (347) 555 55-55,</p>
                <p>+7 (347) 123 45-67</p>
            </span>
            <i class="fa fa-phone" aria-hidden="true"></i>
        </div>
        <div>
            <span>
                <p>г. Норильск, район Талнах,</p><p>ул. Таймырская, д. 15</p>
            </span>
            <i class="fa fa-map-marker" aria-hidden="true"></i>
        </div>
    </div>
    <?php if(!Yii::$app->user->isGuest) { ?>
        <div class="container" style="text-align:left">
            <a href="<?= \yii\helpers\URL::to(['/admin']) ?>" class="btn btn-default">Админ</a>
            <a href="<?= \yii\helpers\URL::to(['/site/logout']) ?>" class="btn btn-default">Выход</a>
        </div>
    <?php } ?>
</nav>