<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->params['active_page'][] = 'contacts';

?>
<div class="main_wrapper contacts">
    <ul class="breadcrumbs breadcrumbs_left">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>Контакты</li>
    </ul>

    <div class="main">
        <div class="content col-xs-12">
            <h1 class="col-xs-12">Контакты</h1>
            <div class="contact_items">

                <?php foreach ($pages as $page): ?>

                    <div class="item col-xs-12 col-lg-6">
                        <div class="name col-xs-12">
                            <h3> <?= $page->full_title ?></h3>
                        </div>
                        <div class="info col-xs-12">
                            <div class="phones col-xs-12 col-md-4">
                                <h4>Телефон</h4>
                                <?= $page->sportbuilding->phone ?>
                            </div>
                            <div class="adress col-xs-12 col-md-4">
                                <h4>Адрес</h4>
                                <?= $page->sportbuilding->address ?>
                            </div>
                            <div class="worktime col-xs-12 col-md-4">
                                <h4>Режим работы</h4>
                                <?= $page->sportbuilding->work_hours ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($key % 2) {
                        echo '<div class="clearfix"></div>';
                    }
                    ?>
                <?php endforeach; ?>

            </div>
            <div class="map col-xs-12">
                <script type="text/javascript" charset="utf-8" async
                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A65b43463383f2f83de159bf126721287efecbc75496d4b18cdaa811d4e53b9eb&amp;width=100%25&amp;height=360&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
        </div>
    </div>
</div>