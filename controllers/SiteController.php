<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\RegistrationForm;
use frontend\models\Clients;
use frontend\models\SomeAccessories;
use frontend\models\LogintForm;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
  /*   public function behaviors()
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
		
	   $registration = new RegistrationForm();
	   $some = new SomeAccessories();
	   
	   if($some->postExist('RegistrationForm')){
		   
		   $registration->attributes = $some->postExist('RegistrationForm');
		   
		   if($registration->validate() && $registration->registration()){
			   
			   return $this->goHome();
			   
		   }
	   }
		return $this->render('registration', ['registration' => $registration]);
	}
	
	public function actionAddPhone(){
		
		return $model->generate();
		
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
	
	}
