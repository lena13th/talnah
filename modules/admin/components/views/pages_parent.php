<?php
foreach ($pages as $page) {
?>
<option
        value="<?= $page['page_id'] ?>"
    <?php if ($page['alias'] == $model->alias) echo ' selected' ?>
>
    <?= $page['full_title'] ?>

</option>
<?php
}
?>