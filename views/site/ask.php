<?php
/**
 * Created by PhpStorm.
 * User: Rustam
 * Date: 23.07.2017
 * Time: 19:14
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<div class="main_wrapper">
    <ul class="breadcrumbs col-lg-offset-3">
        <li><a href="#"><i class="fa fa-home"></i>Главная</a></li>
        <li>Задать вопрос</li>
    </ul>

    <div class="main feedback">
        <div class="left main_left col-xs-12 col-md-12 col-lg-3">
            <div class="left_block">
                <div class="left_block_content">
                    <ul class="left_menu">
                        <li class="active"><a href="#">Задать вопрос</a></li>
                        <li><a href="#">Анкетирование</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content col-xs-12 col-sm-9 col-md-8 col-lg-9">
            <h1>Задать вопрос</h1>
            <div class="form col-xs-12 col-sm-8">
                <input type="text" name="name" placeholder="Ваше имя">
                <input type="text" name="phone" placeholder="Телефон">
                <input type="text" name="email" placeholder="Адрес электронной почты">
                <textarea name="question" id="" cols="30" rows="10" placeholder="Вопрос или сообщение"></textarea>
                <label><input type="checkbox"><span>Нажимая на кнопку 'Отправить', я даю <a href="<?= Url::to(['/web/agreement.pdf'])?>">согласие на обработку персональных данных</a></span></label>
                <div class="button"><a href="#">Отправить</a></div>
            </div>
<!--            В таком духе происходит вызов. Модель ContactForm. В ней настройки валидации,
                да и без неё не заработает поскольку из модели идут переменные -->
<!--            <div class="form col-xs-12 col-sm-8">-->
<!--                --><?php //$form = ActiveForm::begin(['id' => 'order-form']); ?>
<!--                --><?//= $form->field($model, 'name', ['enableLabel' => false])->textInput(array('placeholder' => 'Ваше имя', 'class' => '')); ?>
<!--                --><?//= $form->field($model, 'phone', ['enableLabel' => false])->widget(\yii\widgets\MaskedInput::className(), [
//                    'mask' => '+7 (999) 999-9999',
//                ])->textInput(array('placeholder' => 'Ваш телефон', 'class' => '')) ?>
<!--                --><?//= $form->field($model, 'email', ['enableLabel' => false])->textInput(array('placeholder' => 'Адрес электронной почты', 'class' => '')); ?>
<!--                --><?//= $form->field($model, 'message', ['enableLabel' => false])->textarea(['rows' => 4, 'placeholder' => 'Вопрос', 'class' => '']) ?>
<!--                --><?//= $form->field($model, 'verifyCode', ['enableLabel' => false])->widget(Captcha::className(), [
//                    'template' => '<div><div class="col-xs-5">{image}</div><div class="">{input}</div></div>',
//                    'class' => '',
//                    'field' => [
//                        'inputOptions' => [
//                            'class' => '',
//                            'placeholder' => 'Проверочый код'
//                        ]
//                    ]
//                ])?>
<!--                --><?//= $form->field($model, 'checkbox')
//                ->checkbox([
//                'label' => ''>согласие на обработку персональных данных</a></span>',
//                'labelOptions' => [
//                'style' => 'padding-left:20px;'
//                ],
//                'disabled' => true
//                ]) ?>
<!--                --><?//= Html::submitButton('<span>Отправить</span>', ['class' => 'button', 'name' => 'order-button']) ?>
<!--                --><?php //ActiveForm::end(); ?>
<!--            </div>-->
        </div>
        </div>
    </div>
</div>
