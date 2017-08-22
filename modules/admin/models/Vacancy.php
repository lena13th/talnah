<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property integer $vacancy_id
 * @property string $title
 * @property integer $published
 * @property string $short_description
 * @property string $content
 * @property string $salary
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $updated_on
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['published'], 'integer'],
            [['content'], 'string'],
            [['updated_on'], 'safe'],
            [['title', 'short_description', 'salary', 'meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vacancy_id' => 'ID',
            'title' => 'Заголовок',
            'published' => 'Опубликовано',
            'short_description' => 'Краткое описание',
            'content' => 'Текст вакансии',
            'salary' => 'Заработная плата',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'updated_on' => 'Updated On',
        ];
    }
}
