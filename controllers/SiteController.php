<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\RegistrationForm;
use frontend\models\RestForm;
use frontend\models\Clients;
use frontend\models\SomeAccessories;
use frontend\models\LogintForm;
use dektrium\user\traits\EventTrait;
use frontend\models\ClinetPhone;

/**
 * Site controller
 */
class SiteController extends Controller
{
    const EVENT_BEFORE_LOGIN = 'beforeLogin';

    /**
     * Event is triggered after logging user in.
     * Triggered with \dektrium\user\events\FormEvent.
     */
    const EVENT_AFTER_LOGIN = 'afterLogin';

    /**
     * Event is triggered before logging user out.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_LOGOUT = 'beforeLogout';

    /**
     * Event is triggered after logging user out.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_LOGOUT = 'afterLogout';

    /**
     * Event is triggered before authenticating user via social network.
     * Triggered with \dektrium\user\events\AuthEvent.
     */
    const EVENT_BEFORE_AUTHENTICATE = 'beforeAuthenticate';

    /**
     * Event is triggered after authenticating user via social network.
     * Triggered with \dektrium\user\events\AuthEvent.
     */
    const EVENT_AFTER_AUTHENTICATE = 'afterAuthenticate';

    /**
     * Event is triggered before connecting social network account to user.
     * Triggered with \dektrium\user\events\AuthEvent.
     */
    const EVENT_BEFORE_CONNECT = 'beforeConnect';

    /**
     * Event is triggered before connecting social network account to user.
     * Triggered with \dektrium\user\events\AuthEvent.
     */
    const EVENT_AFTER_CONNECT = 'afterConnect';
	
	
	use EventTrait;
	
	
	
	
	
	
	/**
     * @inheritdoc
     */
/*     public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    } */

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		$model = new Clients();
        return $this->render('index', ['model'=>$model]);
    }
	
    public function actionRegist(){
		
	   $registration = Yii::createObject(RegistrationForm::className());
	   $some = Yii::createObject(SomeAccessories::className());
	   $id = $some->render_id();
	   $phone_default = $some->generate();
	   
	   if($some->postExist('RegistrationForm')){
		   
		   $registration->attributes = $some->postExist('RegistrationForm');
		   

		   if($registration->validate() && $registration->registration($id) && $registration->addPhone($id, $phone_default)){
			   
			       $this->goHome();
			 }
		   }
		   
		return $this->render('registration', ['registration' => $registration]);
	}
	
	
	public function actionAddPhone(){
		
		$rest = Yii::createObject(RestForm::className());
	    $some = Yii::createObject(SomeAccessories::className());
		
		if($some->postExist('RestForm')){
			
			$rest->attributes = $some->postExist('RestForm');
			
			if($rest->validate() && $rest->updatePhone(\Yii::$app->user->getId())){
				
				$this->goHome();
		   }

	}
	return $this->render('getid', ['rest' => $rest]);

	}
	
	
	public function actionLogin(){
		
	{
         if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }
		
        $model = new LogintForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('logins', ['model' => $model]);
    }
		
		
	}
	public function actionLogout()
    {
    /*     $event = $this->getUserEvent(\Yii::$app->user->identity);

        $this->trigger(self::EVENT_BEFORE_LOGOUT, $event); */

        Yii::$app->user->logout();
/* 
        $this->trigger(self::EVENT_AFTER_LOGOUT, $event); */

        return $this->goHome();
    }

	public function actionSuper(){
		
		$var = Yii::createObject(RegistrationForm::className());
		$var_1 = $var->add_phone;
		$var = $var->varAdd($var_1);
		return $var;
		
		
	}
}