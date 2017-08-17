<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "ads".
 *
 * @property integer $ads_id
 * @property string $title
 * @property integer $published
 * @property string $content
 * @property string $updated_on
 */
class Ads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['published'], 'integer'],
            [['content'], 'required'],
            [['updated_on'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 1023],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ads_id' => 'ID',
            'title' => 'Заголовок',
            'published' => 'Опубликовано',
            'content' => 'Текст объявления',
            'updated_on' => 'Дата изменения',
        ];
    }
}
