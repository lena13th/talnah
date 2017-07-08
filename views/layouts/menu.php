<?php
use yii\helpers\Url;

?>
<nav class="nav_line">
    <div class="menu_container window">
        <div class="close_window">✕</div>
        <ul class="menu">
            <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Главная</a></li>
            <li><a href="#"><i class="fa fa-building" aria-hidden="true"></i> Спортивные сооружения</a></li>
            <li><a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Новости</a></li>
            <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> О нас</a></li>
            <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Календарь мероприятий</a></li>
            <li><a href="#"><i class="fa fa-address-card-o" aria-hidden="true"></i> Контакты</a></li>
            <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> Обратная связь</a></li>
        </ul>
    </div>
    <div class="header_contacts">
        <div>
            <span>
                +7 (347) 555 55-55,
                +7 (347) 123 45-67
            </span>
            <i class="fa fa-phone" aria-hidden="true"></i>
        </div>
        <div>
            <span>
                г. Норильск, район Талнах, ул. Таймырская, д. 15
            </span>
            <i class="fa fa-map-marker" aria-hidden="true"></i>
        </div>
    </div>
    <button type="button" class="navbar-toggle">
        <span class="sr-only">Меню</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <?php if(!Yii::$app->user->isGuest) { ?>
        <div class="container" style="text-align:left">
            <a href="<?= \yii\helpers\URL::to(['/admin']) ?>" class="btn btn-default">Админ</a>
            <a href="<?= \yii\helpers\URL::to(['/site/logout']) ?>" class="btn btn-default">Выход</a>
        </div>
    <?php } ?>
</nav class="navbar">