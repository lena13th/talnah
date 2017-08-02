<?php
use yii\helpers\Url;

?>
<footer class="footer_container col-xs-12">
    <div class="footer">
        <div class="footer_left col-xs-12 col-md-6 col-lg-4">
            <div class="footer_company_description">
                Управление по спорту администрации города Норильск, муниципальное бюджетное учреждение
            </div>
            <div class="footer_company_name h3">
                Спортивный комплекс  «ТАЛНАХ»
            </div>
            <hr>
            <div class="footer_contacts">
                <div class="footer_phones">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        <p>+7 (347) 555 55-55,</p>
                        <p>+7 (347) 123 45-67</p>
                    </span>
                </div>
                <div class="footer_adress">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>
                        <p>г. Норильск, район Талнах,</p><p>ул. Таймырская, д. 15</p>
                    </span>
                </div>
            </div>
        </div>
        <div class="footer_right col-xs-12 col-md-6 col-lg-8">
            <div class="footer_menu_container">
                <div class="h4">Карта сайта</div>
                <ul class="footer_menu">
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">Спортивные сооружения</a></li>
                    <li><a href="#">Новости</a></li>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Календарь мероприятий</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="#">Обратная связь</a></li>
                </ul>
            </div>
            <div class="footer_menu_container">
                <div class="h4">Спортивные сооружения</div>
                <ul class="footer_menu">
                    <li><a href="#">СОЦ “Восток”</a></li>
                    <li><a href="#">КОЦ</a></li>
                    <li><a href="#">Плавательный бассейн</a></li>
                    <li><a href="#">СЗ “Горняк”</a></li>
                    <li><a href="#">КК “Умка”</a></li>
                    <li><a href="#">СТК “Гора Отдельная”</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="footer_year_container col-xs-12">
    <div class="footer_year">
        <?= date('Y') ?> г.
    </div>
</div>
