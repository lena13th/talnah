<?php

namespace app\components;
use yii\base\Widget;
use app\models\Company;
use Yii;
use yii\caching\DbDependency;

class CompanyWidget extends Widget{
	public $object;
	public $company;

	public function init() {
			parent::init();
//        $this->company = Company::getDb()->cache(function ($db) {
//            return Company::findOne(Yii::$app->params['company_id']);
//        }, 3600); //change
        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM company',
        ]);
        $this->company = Yii::$app->db->cache(function ($db) {
            return Company::find()->where(['company_id' => '1'])->one();
        }, 0, $dependency);
    }

	public function run() {



        switch ($this->object) {
            case 'organization':
                return $this->company->organization; break;
            case 'name':
                return $this->company->name; break;
            case 'phone':
                return $this->company->phone; break;
            case 'address':
                return $this->company->address; break;
            case 'email':
                return $this->company->email; break;
            case 'requisites':
                return $this->company->requisites; break;
            case 'documents':
                return $this->company->documents; break;
            case 'image':
                return $this->company->image; break;
            case 'meta_title':
                return $this->company->meta_title; break;
            case 'meta_description':
                return $this->company->meta_description; break;
        }

	}

}

