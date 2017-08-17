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
            [['title', 'full_title', 'alias'], 'required'],
            [['published'], 'integer'],
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
            'page_id' => 'Page ID',
            'title' => 'Title',
            'full_title' => 'Full Title',
            'alias' => 'Alias',
            'published' => 'Published',
            'content' => 'Content',
            'parent_alias' => 'Parent Alias',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'updated_on' => 'Updated On',
        ];
    }
}
