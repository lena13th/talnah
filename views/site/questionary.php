<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->params['active_page'][] = 'feedback';
$this->params['active_child_page'][] = 'questionary';

?>
<div class="main_wrapper">
    <ul class="breadcrumbs breadcrumbs_left">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>Анкетирование</li>
    </ul>

    <div class="main feedback">
        <div class="left main_left col-xs-12 col-md-12 col-lg-3">
            <div class="left_block">
                <div class="left_block_content">
                    <ul class="left_menu">
                        <li><a href="<?= Url::to(['/site/ask']) ?>">Задать вопрос</a></li>
                        <li class="active"><a href="<?= Url::to(['/site/questionary']) ?>">Анкетирование</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content col-xs-12 col-sm-9 col-md-8 col-lg-9">
            <h1>Анкетирование</h1>
            <p>Уважаемые гости сайта и посетители наших сооружений, для улучшения качества предлагаемых услуг просим Вас ответить на несколько вопросов в нашей анкете.</p><p> Ваше мнение очень важно для нас!</p>

        <?php if(Yii::$app->session->hasFlash('success')) {?>
                <div class="order send alert-success alert fade in">
                    <p>Ваше письмо отправлено!</p> <p>Спасибо за заявку, в скором времени мы свяжемся с вами.</p>
                </div>

            <?php } elseif(Yii::$app->session->hasFlash('error')) { ?>
                <div class="order send">
                    <p>Ошибка!</p> <p>В результате отправки возникла ошибка, пожалуйста попробуйте снова.</p>
                </div>
            <?php } ?>
            <div class="form col-xs-12 col-sm-8">
                <?php
//                $model=$questionary;
                ?>
                <?php $form = ActiveForm::begin(['id' => 'order-form']); ?>
                <?= $form->field($model, 'name', ['enableLabel' => false])->textInput(array('placeholder' => 'Ваше имя', 'class' => '')); ?>
<!--                --><?//= $form->field($model, 'phone', ['enableLabel' => false])->widget(\yii\widgets\MaskedInput::className(), [
//                    'mask' => '+7 (999) 999-9999',
//                ])->textInput(array('placeholder' => 'Ваш телефон', 'class' => '')) ?>
                <?= $form->field($model, 'email', ['enableLabel' => false])->textInput(array('placeholder' => 'Адрес электронной почты', 'class' => '')); ?>
<!--                --><?//= $form->field($model, 'message', ['enableLabel' => false])->textarea(['rows' => 4, 'placeholder' => 'Ваш отзыв, предложение', 'class' => '']) ?>

                <?php
                foreach ($questionary as $quest) {
                    ?>

                    <?= $form->field($model, 'text_'.$quest->id, ['enableLabel' => false])->textarea(['rows' => 2, 'placeholder' => $quest->name_field, 'class' => '']) ?>

                    <?php
                }
                ?>


                <!--                --><?//= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                //                    'template' => '<div><div class="col-xs-5">{image}</div><div class="col-xs-6 pull-right">{input}</div></div>',
                //                ]) ?>
                <!--                --><?//= $form->field($model, 'agreement')
                //                ->checkbox([
                //                'label' => 'согласие на обработку персональных данных',
                //                'labelOptions' => [
                //                'style' => 'padding-left:20px;'
                //                ],
                //                'disabled' => true
                //                ]) ?>
                <label><input type="checkbox"><span>Нажимая на кнопку 'Отправить', я даю <a href="<?= Url::to(['/web/agreement.pdf'])?>">согласие на обработку персональных данных</a></span></label>
                <?= Html::submitButton('<span>Отправить</span>', ['class' => 'button', 'name' => 'order-button']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
</div>
