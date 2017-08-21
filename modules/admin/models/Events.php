<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property string $title
 * @property integer $published
 * @property string $short_description
 * @property string $content
 * @property string $date_event_start
 * @property string $date_event_end
 * @property integer $related_sportbuilding
 * @property string $updated_on
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['published', 'related_sportbuilding'], 'integer'],
            [['content'], 'string'],
            [['date_event_start', 'date_event_end', 'updated_on'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['short_description'], 'string', 'max' => 1023],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'published' => 'Опубликовано',
            'short_description' => 'Краткое описание',
            'content' => 'Содержание',
            'date_event_start' => 'Дата начала события',
            'date_event_end' => 'Дата окончания события',
            'related_sportbuilding' => 'Related Sportbuilding',
            'updated_on' => 'Updated On',
        ];
    }
}
