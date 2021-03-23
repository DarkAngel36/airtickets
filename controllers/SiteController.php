<?php

namespace app\controllers;

use app\models\searchFligth;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller {
	public $layout = 'site';
	
	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only'  => ['logout'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow'   => true,
						'roles'   => ['@'],
					],
				],
			],
			'verbs'  => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function actions() {
		return [
			'error'   => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class'           => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}
	
	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex() {
		$model = new searchFligth();
		
		$model->Adult    = 0;
		$model->Children = 0;
		$model->Infants  = 0;
		
		$WhenceSelectItems = [1 => 'Test1', 2 => 'TEST2', 3 => 'TEST3'];
		$WhereSelectItems  = [1 => 'Test1', 2 => 'TEST2', 3 => 'TEST3'];
		$SeatClassItems    = [
			'ECONOMY'  => 'Econom',
			'BUSSINES' => 'Bussines',
			'FIRST'    => 'First',
		];
		
		return $this->render('index', [
			'model'             => $model,
			'WhenceSelectItems' => $WhenceSelectItems,
			'WhereSelectItems'  => $WhereSelectItems,
			'SeatClassItems'    => $SeatClassItems,
		]);
	}
	
	/**
	 * search result
	 */
	public function actionSearchResult() {
		return $this->render('search-result', []);
	}
	
	/**
	 * Login action.
	 *
	 * @return Response|string
	 */
	public function actionLogin() {
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		
		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}
		
		$model->password = '';
		
		return $this->render('login', [
			'model' => $model,
		]);
	}
	
	/**
	 * Logout action.
	 *
	 * @return Response
	 */
	public function actionLogout() {
		Yii::$app->user->logout();
		
		return $this->goHome();
	}
	
	/**
	 * Displays contact page.
	 *
	 * @return Response|string
	 */
	public function actionContact() {
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
			Yii::$app->session->setFlash('contactFormSubmitted');
			
			return $this->refresh();
		}
		
		return $this->render('contact', [
			'model' => $model,
		]);
	}
	
	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout() {
		return $this->render('about');
	}
}
