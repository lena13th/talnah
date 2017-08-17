<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $company_id
 * @property string $organization
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property string $requisites
 * @property string $documents
 * @property string $image
 * @property string $rekblock
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $updated_on
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organization', 'name'], 'required'],
            [['requisites', 'documents', 'rekblock'], 'string'],
            [['updated_on'], 'safe'],
            [['organization', 'name', 'address', 'image', 'meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'organization' => 'Organization',
            'name' => 'Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'email' => 'Email',
            'requisites' => 'Requisites',
            'documents' => 'Documents',
            'image' => 'Image',
            'rekblock' => 'Rekblock',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'updated_on' => 'Updated On',
        ];
    }
}
