<?php
namespace frontend\models;

use yii\base\Model;

class SomeAccessories extends Model
{
	public $_rand;
	
	public function generate()
	{
		return $this->_rand = mt_rand(111111111,999999999);
		
	}
	
	public function postExist($post){
		
		return \Yii::$app->request->post($post);
		
	}
	
	public function getExist($get){
		
		return \Yii::$app->request->get($get);
	}
	
	
}