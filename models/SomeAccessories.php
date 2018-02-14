<?php

namespace frontend\models;
use yii\base\Model;

class SomeAccessories extends Model
{
	public $_rand;
	
	public function Password()
	{
		return $this->_rand = mt_rand(111111111,999999999);
		
	}
	
}

?>