<?php
/**
 * @var $profile Profile
 *
 * */
namespace backend\controllers;

use backend\models\Profile;
use backend\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Admin;
use yii\web\HttpException;
use yii\web\ForbiddenHttpException;
use backend\models\Lang;
use yii\helpers\Url;
use backend\models\UploadForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
	    return [
		    'access' => [
			    'class' => AccessControl::className(),
			    'only' => ['logout'],
			    'rules' => [
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
	    /*return [
		    'access' => [
			    'class' => AccessControl::className(),
			    'rules' => [
				    [
					    'actions' => ['error'],
					    'allow' => true,
				    ],
				    [
					    'actions' => ['index'],
					    'allow' => true,
					    'roles' => ['@'],
				    ],
			    ],
		    ],
	    ];*/
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
	/*public function beforeAction( $action ) {
		var_dump(Yii::$app->user->can('admin'));
	}*/
	
	/**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
	    $curLang = Lang::getCurrent();
	    
	    /*if (!\Yii::$app->user->can('updateNews')) {
		    throw new ForbiddenHttpException( '' . ( $curLang['local'] == 'en-EN' ) ? 'Access denied' : 'Доступ запрещен!' . '' );
		  var_dump(!\Yii::$app->user->can('updateNews'));
		    Yii::$app->response->redirect(Url::to('site/login'));
	    }*/
	    $user = Admin::isAdmin(Yii::$app->user->identity->username);
	    $profile = Profile::find()->where(['user_id' => $user['id']])->one();
	    
        return $this->render('index', ['user' => $user['username']]);
    }
    
    public function actionProfile() {
    	
	    $user = Admin::isAdmin(Yii::$app->user->identity->username);
	    $profile = Profile::find()->where(['user_id' => $user['id']])->one();
	    
    	
    	return $this->render('profile', ['profile' => $profile, 'email' => $user['email'], ]);
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

    /**
     * Login action.
     *
     * @return string
     */
   /* public function actionLogin()
    {
	    
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
    	
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
	
	public static function urlRedirect($url){
		if($url == "/" ){
			return false;
		}
		if($url){
			if (substr($url, strlen($url)-1) == "/") {
				$url = substr($url,0,strlen($url)-1);
				header("HTTP/1.1 301 Moved Permanently");
				header('Location:'.$url);
				exit();
			}
		}
		return false;
	}
	
	public function actionUpdateAvatar() {
		
    	$upload = new UploadForm();
		$user = Yii::$app->user->id;
		$profile = Profile::find()->where(['user_id' => $user])->one();
		$upload->imageFile = UploadedFile::getInstances($profile, 'avatar');
	
//		$profile->avatar = $upload->imageFile;
		
		if(!empty($upload->imageFile)) {
			$file = $upload->imageFile;
			if(is_array($file)){
				$profile->avatar = implode(",", $file);
			}
			
			if($upload->upload('avatar/')){
				$profile->save();
			};
			return $this->redirect(['profile',
				'profile' => $profile,
			]);
		}
		return $this->render('profile', [
			'profile' => $profile,
		]);
	}
 
}
