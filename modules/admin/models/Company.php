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
 * @property string $field_contacts
 * @property string $about_company
 * @property string $sportbuilding
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
            [['requisites', 'documents', 'rekblock','about_company','field_contacts','sportbuilding'], 'string'],
            [['updated_on'], 'safe'],
            [['organization', 'name', 'address', 'image', 'meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
            [['phone', 'image'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'ID',
            'organization' => 'Организация',
            'name' => 'Наименование',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'email' => 'Email',
            'requisites' => 'Реквизиты',
            'documents' => 'Учредительные документы',
            'field_contacts' => 'Поле на странице Контакты',
            'about_company' => 'Информация о компании (страница О нас)',
            'sportbuilding' => 'Страница Спортивные сооружения',
            'image' => 'Фоновое изображение',
            'rekblock' => 'Рекламный блок',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'updated_on' => 'Updated On',
        ];
    }
}
