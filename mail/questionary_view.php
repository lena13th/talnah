<?php use yii\helpers\Html; ?>
<?php use yii\helpers\Url; ?>
<?php use yii\bootstrap\ActiveForm; ?>
<?php use yii\captcha\Captcha; ?>

<div style=" position: relative; text-align: left; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
		<div style="text-align: left; padding-top: 20px; padding-bottom: 20px; padding-left:20px;">
			<span style="margin-top: 20px; margin-bottom: 10px; font-size: 24px; font-weight:100!important; color: #444!important;">Форма обратной связи</span>
		</div>
		<p style="padding-left:20px;">От: <?= $model->name ?></p>

		<?php if($model->email) { ?>
		<p style="padding-left:20px;">email: <?= $model->email ?></p>
		<?php } ?>
    <?php
foreach ($questionary as $quest) {

    $pp='text_'.$quest->id;
    if ($model->$pp) { ?>
        <p style="padding-left:20px;"><?= $quest->name_field  ?>: <?= $model->$pp ?></p>
    <?php } ?>
    <?php
}
?>
</div>
