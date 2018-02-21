<?php
namespace frontend\models;

use Yii;
use frontend\models\Clients;
use yii\db\ActiveRecord;
use dektrium\user\models\User;
use frontend\models\SomeAccessories;
use frontend\models\ClinetPhone;
use yii\base\Model;

class RegistrationForm extends Model 
{

    public $first_name;
    public $last_name;
    public $age;
	public $phone_digital;
	public $client_id;
	public $phone;
	public $add_phone;
	
	public function rules()
    {
        return [
			
	    [['first_name', 'last_name', 'phone_digital'], 'string'],
		
	    [['first_name','last_name'], 'trim'],
		
 		[['first_name', 'last_name'], 'string', 'min'=> 4, 'max' => 50],
		
		[['first_name', 'last_name'], 'required'],
		
		[
		[
	    'first_name',
		'last_name'],
		'unique',
		'targetClass' => Clients::className(),
		'message' => \Yii::t('app', 'Fuck you'),
		],
		
		
		[['phone'], 'string'],
		[['phone'], 'trim'],
		
        [['age'], 'integer'],
 		[['age'], 'number', 'max' => 100],
		
		];
    }
	
	private function generate(){
		
		$generate = \Yii::createObject(SomeAccessories::className());
		
		return $generate->generate();
		
	}
	public function registration($id){
		
	   $registration = Yii::createObject(Clients::className());
	   $registration->id = $id;
	   $registration->first_name = $this->first_name;
	   $registration->last_name = $this->last_name;
       $registration->age = $this->age;
	   
	   return $registration->save();
	}
	
    public function addPhone($id, $phone_default){
		
		$addPhone = Yii::createObject(ClinetPhone::className());
		
		$addPhone->id = $phone_default;
		
		$addPhone->client_id = $id;
		
		$addPhone->phone_digital = $this->phone_digital;
		
		return $addPhone->save();

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