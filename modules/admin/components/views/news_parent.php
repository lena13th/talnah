<?php
foreach ($pages as $page) {
?>
<option
        value="<?= $page['id'] ?>"
    <?php if ($page['id'] == $model->related_event) echo ' selected' ?>
>
    <?= $page['title'] ?>

</option>
<?php
}
?>