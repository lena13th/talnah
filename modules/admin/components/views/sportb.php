
<!--'items' => [-->
<?php foreach ($sportbs as $sportb): ?>

['label' => '<?= $sportb->title ?>', 'icon' => 'gear', 'url' => ['sportbuilding/index'],],
<?php endforeach; ?>

<!--],-->