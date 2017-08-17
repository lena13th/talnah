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
            [['date_event_start', 'date_event_end', 'date_public'], 'safe'],
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
            'news_id' => 'ID',
            'title' => 'Заголовок',
            'published' => 'Опубликовано',
            'short_description' => 'Краткое описание',
            'content' => 'Содержание',
            'date_event_start' => 'Дата начала события',
            'date_event_end' => 'Дата окончания события',
            'image' => 'Главное изображение',
            'related_event' => 'Связанное событие из анонсов',
            'related_sportbuilding' => 'Связанное сооружение',
            'date_public' => 'Дата публикации',
        ];
    }
}
