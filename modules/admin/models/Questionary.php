<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "questionary".
 *
 * @property integer $id
 * @property string $name_field
 * @property integer $published
 */
class Questionary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'questionary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_field'], 'required'],
            [['published'], 'integer'],
            [['name_field'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_field' => 'Вопрос в анкете',
            'published' => 'Опубликовано',
        ];
    }
}
