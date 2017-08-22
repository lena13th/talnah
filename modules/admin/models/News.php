<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
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
    public $image;
    public $gallery;
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
            [['title'], 'string', 'max' => 255],
            [['short_description'], 'string', 'max' => 1023],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 10],
        ];
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
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
            'gallery' => 'Фотографии',
            'date_event_start' => 'Дата начала события',
            'date_event_end' => 'Дата окончания события',
            'image' => 'Главное изображение',
            'related_event' => 'Связанное событие из анонсов',
            'related_sportbuilding' => 'Связанное сооружение',
            'date_public' => 'Дата публикации',
        ];
    }

    public function upload(){
        if($this->validate()){
            $path = 'images/news_item/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }

    public function uploadGallery(){
        if($this->validate()){
            foreach($this->gallery as $file){
                $path = 'images/news_item/'. $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        } else {
            return false;
        }
    }
}
