<?php
namespace frontend\models;

use frontend\models\Clients;
use yii\db\ActiveRecord;
use dektrium\user\models\User;
use frontend\models\SomeAccessories;
use frontend\models\ClinetPhone;
use yii\base\Model;

class RegistrationForm extends Model 
{

    public $First_name;
    public $Last_name;
    public $Age;
	public $Phone_digital;
	public $Client_id;
	public $Id_user;
	
	public function rules()
    {
        return [
		
		    [['First_name', 'Last_name'], 'required'],
            [['Age'], 'integer'],
            [['First_name', 'Last_name'], 'string', 'max' => 50],
			
			/* [['client_id', 'phone_digital'], 'required'],
            [['client_id'], 'integer'],
            [['phone_digital'], 'string', 'max' => 10],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientClient::className(), 'targetAttribute' => ['client_id' => 'id']], */
			
		];
    }
	
	public function registration(){
		
	   $registration = new Clients();
	   $password = new SomeAccessories();
	   $password = $password->Password();
	   $registration->id = $password;
	   $registration->first_name = $this->First_name;
	   $registration->last_name = $this->Last_name;
       $registration->age = $this->Age;
	   
	   return $registration->save();
	}
    public function addPhone(){
		
		$this->Id_user = User::getId();
		$addPhone = new ClinetPhone();
		$addPhone->Client_id = $this->Id_user;
		$addPhone->phone_digital = $this->Phone_digital;
		
		return $addPhone->save();
	}
	
}

?>