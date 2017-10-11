<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $page_id
 * @property string $title
 * @property string $full_title
 * @property string $alias
 * @property integer $published
 * @property string $content
 * @property string $parent_alias
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $updated_on
 * @property integer $pageOrder
 * @property mixed sportbuilding
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['published', 'pageOrder'], 'integer'],
            [['content'], 'string'],
            [['updated_on'], 'safe'],
            [['title', 'full_title', 'alias', 'parent_alias', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id' => 'ID',
            'title' => 'Заголовок',
            'full_title' => 'Полное название комплекса',
            'alias' => 'Alias',
            'published' => 'Опубликовано',
            'content' => 'Содержание страницы',
            'parent_alias' => 'Родительская страница',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'updated_on' => 'Updated On',
            'pageOrder' => 'Порядковый номер',
        ];
    }

    public function getSportbuilding(){
        return $this->hasOne(Sportbuilding::className(), ['alias' => 'alias']);
    }
}
