<?php
use app\components\CompanyWidget;
use yii\helpers\Url;

?>
<footer class="footer_container col-xs-12">
    <div class="footer">
        <div class="footer_left col-xs-12 col-md-6 col-lg-4">
            <div class="footer_company_description">
                    <?= CompanyWidget::widget(['object' => 'organization']); ?>
            </div>
            <div class="footer_company_name h3">
                <?= CompanyWidget::widget(['object' => 'name']); ?>
            </div>
            <hr>
            <div class="footer_contacts">
                <div class="footer_phones">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        <?= CompanyWidget::widget(['object' => 'phone']); ?>
                    </span>
                </div>
                <div class="footer_adress">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>
                        <?= CompanyWidget::widget(['object' => 'address']); ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="footer_right col-xs-12 col-md-6 col-lg-8">
            <div class="footer_menu_container">
                <div class="h4">Карта сайта</div>
                <ul class="footer_menu">
                    <li><a href="<?= Url::to(['/site/index']) ?>">Главная</a></li>
                    <li><a href="<?= Url::to(['/page/index', 'alias' => 'sportbuilding']) ?>">Спортивные сооружения</a></li>
                    <li><a href="<?= Url::to(['/news/index']) ?>">Новости</a></li>
                    <li><a href="<?= Url::to(['/page/index', 'alias' => 'about',]) ?>">О нас</a></li>
                    <li><a href="#">Календарь мероприятий</a></li>
                    <li><a href="<?= Url::to(['/site/contacts']) ?>">Контакты</a></li>
                    <li><a href="<?= Url::to(['/site/feedback']) ?>">Обратная связь</a></li>
                </ul>
            </div>
            <div class="footer_menu_container">
                <div class="h4">Спортивные сооружения</div>
                <?= app\components\SubmenuWidget::widget(['tpl' => 'submenu_footer', 'parent_alias' => 'sportbuilding']); ?>
            </div>
        </div>
    </div>
</footer>
<div class="footer_year_container col-xs-12">
    <div class="footer_year">
        <?= date('Y') ?> г.
    </div>
</div>
