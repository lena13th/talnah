<?php
use yii\helpers\Url;

if (!empty($date_news)) {
    $date_news=array_keys($date_news);
    sort($date_news);
    reset($date_news);
    $date_news = array_unique($date_news);

}
?>

<div class="left_block">
    <div class="left_block_content">
        <ul class="left_menu">
            <?php
            foreach ($date_news as $item_date_news) { ?>
                <li
                    <?php if ($item_date_news == $yr) { ?>
                        class="active"
                    <? } ?>
                >
                    <a href="<?= Url::to(['/calendar/view', 'yr' => $item_date_news]) ?>">Отчет о проведенных мероприятиях в <?= $item_date_news ?> году</a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>