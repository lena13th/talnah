<?php 

namespace app\models;
use yii\db\ActiveRecord;

class News extends ActiveRecord{
//	public static function tableName() {
//			return 'vacancy';
//	}
   public function behaviors()
   {
       return [
           'image' => [
               'class' => 'rico\yii2images\behaviors\ImageBehave',
           ]
       ];
   }
}