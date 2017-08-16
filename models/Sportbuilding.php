<?php 

namespace app\models;
use yii\db\ActiveRecord;

class Sportbuilding extends ActiveRecord{
//	public static function tableName() {
//			return 'vacancy';
//	}
    public function getPage(){
        return $this->hasOne(Page::className(), ['alias' => 'alias']);
    }
}