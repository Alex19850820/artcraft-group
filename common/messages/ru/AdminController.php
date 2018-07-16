<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 14.12.2017
 * Time: 13:33
 */
namespace backend\controllers;

use Symfony\Component\Console\Helper\Helper;
use yii\helpers\Url;
use yii\web\Controller;
use backend\models\LoginForm;
use Yii;
use backend\models\Admin;
use yii\web\NotFoundHttpException;
use yii\web\User;
use yii\filters\AccessControl;
use backend\models\Lang;
use yii\web\ForbiddenHttpException;
use dektrium\user\filters\AccessRule;


class AdminController extends Controller{
	
	public $layout = '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app/layouts/main';
	
	public function behaviors()
	{
		return [
			// анонимное поведение, прикрепленное по имени класса
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'actions'=>['login','error'],
						'roles' => ['?'],
					],
					[
						'actions' => ['index'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}
	
	public function actionIndex(){
		
		Yii::$app->language = 'ru';

		/*need do it method check the user of him rules*/
		$user = Admin::isAdmin(Yii::$app->user->identity->username);
		
		if($user['username'] == 'admin'){
			return $this->render('index');
		}
		return $this->render(Url::to(['../site/index']));
		
	}
	
	public function beforeAction($action) {
		
		$user = Admin::isAdmin(Yii::$app->user->identity->username);
		$role = Yii::$app->authManager->getRole($user);
		if($role->name == 'admin') {
			return parent::beforeAction($action);
		} else {
			return $this->goBack('/');
		}
	}
}