<?php

namespace app\components;
use yii\base\Widget;
use app\models\Company;
use Yii;

class CompanyWidget extends Widget{
	public $object;

	public function init() {
			parent::init();
	}

	public function run() {
		$company = Company::getDb()->cache(function ($db) {
   			return Company::findOne(Yii::$app->params['company_id']);;
		}, 60); //change

        switch ($this->object) {
            case 'organization':
                return $company->organization; break;
            case 'name':
                return $company->name; break;
            case 'phone':
                return $company->phone; break;
            case 'address':
                return $company->address; break;
            case 'email':
                return $company->email; break;
            case 'requisites':
                return $company->requisites; break;
            case 'documents':
                return $company->documents; break;
            case 'image':
                return $company->image; break;
            case 'meta_title':
                return $company->meta_title; break;
            case 'meta_description':
                return $company->meta_description; break;
        }

	}

}

