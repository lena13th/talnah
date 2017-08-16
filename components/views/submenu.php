<?php use yii\helpers\Url;?>
<span class="submenu_expand"></span>
<ul class="submenu">
    <?php foreach ($child_pages as $child_page): ?>
        <li
            <?php if ($child_page->alias == $active_submenu) { ?>
                class="active"
            <? } ?>
        >
            <a href="<?= Url::to(['/page/index', 'alias' => $child_page->alias, 'parent_alias' => $parent_alias]) ?>">
                <?= $child_page->title ?>
            </a>
        </li>
    <?php endforeach; ?>

</ul>