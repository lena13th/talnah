<?php 

namespace app\models;
use yii\db\ActiveRecord;

class Events extends ActiveRecord{
//	public static function tableName() {
//			return 'vacancy';
//	}
    public function getNews(){
        return $this->hasOne(News::className(), ['id' => 'related_news']);
    }
}