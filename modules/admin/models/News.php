<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $news_id
 * @property string $title
 * @property integer $published
 * @property string $short_description
 * @property string $content
 * @property string $date_event_start
 * @property string $date_event_end
 * @property string $image
 * @property integer $related_event
 * @property integer $related_sportbuilding
 * @property string $date_public
 * @property string $updated_on
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['published', 'related_event', 'related_sportbuilding'], 'integer'],
            [['content'], 'string'],
            [['date_event_start', 'date_event_end', 'date_public', 'updated_on'], 'safe'],
            [['title', 'image'], 'string', 'max' => 255],
            [['short_description'], 'string', 'max' => 1023],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'title' => 'Title',
            'published' => 'Published',
            'short_description' => 'Short Description',
            'content' => 'Content',
            'date_event_start' => 'Date Event Start',
            'date_event_end' => 'Date Event End',
            'image' => 'Image',
            'related_event' => 'Related Event',
            'related_sportbuilding' => 'Related Sportbuilding',
            'date_public' => 'Date Public',
            'updated_on' => 'Updated On',
        ];
    }
}
