<?php 

namespace frontend\models;

use Yii;
use frontend\models\Clients;
use yii\db\ActiveRecord;
use dektrium\user\models\User;
use frontend\models\SomeAccessories;
use frontend\models\ClinetPhone;
use yii\base\Model;

class RestForm extends Model 
{
	public $phone_digital;
	public $client_id;
	public $phone;

public function rules()
    {
    return [
	[['phone_digital', 'phone'], 'required'],
	
	[['phone_digital'], 'string'],
    [['phone'], 'string'],
    [['phone'], 'trim'],
];
	}

    public function updatePhone($id){
		
		$addPhone = ClinetPhone::find()
		->where(['client_id' => $id])
		->all();
		
		foreach($addPhone as $phone){
			
			$phone->id = $this->phone;
			$phone->phone_digital = $this->phone_digital;
			$phone->update(false);
			
		}
}
}

?>