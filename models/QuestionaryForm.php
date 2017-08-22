<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class QuestionaryForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public $text_1;
    public $text_2;
    public $text_3;
    public $text_4;
    public $text_5;
    public $text_6;
    public $text_7;
    public $text_8;
    public $text_9;
    public $text_10;
    public $text_11;
    public $text_12;
    public $text_13;
    public $text_14;
    public $text_15;
    public $text_16;
    public $text_17;
    public $text_18;
    public $text_19;
    public $text_20;
    public $verifyCode;
    public $agreement;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
//            [['name', 'phone', 'message', 'agreement'], 'required'],
            [['name', 'agreement'], 'required'],
            [['text_1',
                'text_2',
                'text_3',
                'text_4',
                'text_5',
                'text_6',
                'text_7',
                'text_8',
                'text_9',
                'text_10',
                'text_11',
                'text_12',
                'text_13',
                'text_14',
                'text_15',
                'text_16',
                'text_17',
                'text_18',
                'text_19',
                'text_20',
            ], 'string'],

            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Пожалуйста, введите проверочный код *',
            'name' => 'Имя *',
            'email' => 'E-mail',
            'message' => 'Сообщение *',
//            'phone' => 'Телефон *',
            'agreement' => 'Согласие'
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
}
