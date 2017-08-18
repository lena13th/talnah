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
            'id' => 'Event ID',
            'title' => 'Title',
            'published' => 'Published',
            'short_description' => 'Short Description',
            'content' => 'Content',
            'date_event_start' => 'Date Event Start',
            'date_event_end' => 'Date Event End',
            'related_sportbuilding' => 'Related Sportbuilding',
            'updated_on' => 'Updated On',
        ];
    }
}
