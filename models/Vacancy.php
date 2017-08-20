<?php 

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

class Vacancy extends ActiveRecord{
//	public static function tableName() {
//			return 'vacancy';
//	}
    public $anketa;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            ['anketa', 'required'],
            [['anketa'], 'file', 'extensions' => 'pdf, doc, docx'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'anketa' => 'Загрузите анкету',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        $filename = 'web/' .$file->baseName. '.' . $file->extension; # i'd suggest adding an absolute path here, not a relative.
        $file->saveAs($filename);
        $message->attach($filename);

        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo('mr-15@mail.ru')
                ->attach($this->file)
                ->send();

            return true;
        }
        return false;
    }
}