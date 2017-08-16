<?php use yii\helpers\Url;?>
<span class="submenu_expand"></span>
<ul class="footer_menu">
    <?php foreach ($child_pages as $child_page): ?>
        <li>
            <a href="<?= Url::to(['/page/index', 'alias' => $child_page->alias, 'parent_alias' => $parent_alias]) ?>">
                <?= $child_page->title ?>
            </a>
        </li>
    <?php endforeach; ?>

</ul>