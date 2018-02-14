<?php
namespace frontend\models;

use yii\base\Model;

class SomeAccessories extends Model
{
	public $Ran;
	
	public function Password()
	{
		return $this->Ran = mt_rand(111111111,999999999);
		
	}
	
	public function postExist($post){
		
		return \Yii::$app->request->post($post);
		
	}
	
	
}