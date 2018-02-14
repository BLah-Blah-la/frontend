<?php
namespace frontend\models;

use frontend\models\Clients;
use yii\db\ActiveRecord;
use dektrium\user\models\User;
use frontend\models\SomeAccessories;
use frontend\models\ClinetPhone;

class RegistrationForm extends Model 
{

    public First_name;
    public Last_name;
    public Age;
	public Phone_digital;
	public Client_id;
	public Id_user = User::getId();
	
	public function registration(){
		
	   $registration = new Clients();
	   $registration->id = SomeAccessories::Password();
	   $registration->first_name = $this->First_name;
	   $registration->last_name = $this->Last_name;
       $registration->age = $this->Age
	   
	   return $registration->save();
	}
    public function addPhone(){
		
		$addPhone = new ClinetPhone();
		$addPhone->Client_id = $this->Id_user;
		$addPhone->phone_digital = $this->Phone_digital;
		
		return $addPhone->save();
	}
	
}

?>