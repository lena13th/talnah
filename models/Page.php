<?php 

namespace app\models;
use yii\db\ActiveRecord;

class Page extends ActiveRecord{
//	public static function tableName() {
//			return 'vacancy';
//	}
    public function getSportbuilding(){
        return $this->hasOne(Sportbuilding::className(), ['alias' => 'alias']);
    }
}