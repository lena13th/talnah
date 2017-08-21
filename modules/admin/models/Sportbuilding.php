<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "sportbuilding".
 *
 * @property integer $sportbuilding_id
 * @property string $full_title
 * @property string $alias
 * @property integer $published
 * @property string $work_hours
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property string $updated_on
 */
class Sportbuilding extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sportbuilding';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_title', 'alias', 'work_hours', 'address'], 'required'],
            [['published'], 'integer'],
            [['updated_on'], 'safe'],
            [['full_title', 'alias', 'address'], 'string', 'max' => 255],
            [['work_hours'], 'string', 'max' => 1023],
            [['phone', 'email'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sportbuilding_id' => 'Sportbuilding ID',
            'full_title' => 'Full Title',
            'alias' => 'Alias',
            'published' => 'Published',
            'work_hours' => 'Work Hours',
            'phone' => 'Phone',
            'address' => 'Address',
            'email' => 'Email',
            'updated_on' => 'Updated On',
        ];
    }
}
