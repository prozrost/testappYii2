<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Signup;
use app\models\Login;
use app\models\Insert;
use yii\data\SqlDataProvider;
class SiteController extends Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest)
        {
            return $this->redirect(['login']);
        }
        else
        {
            $dataProvider = $this->getRecords();
            return $this->render('index',['dataProvider'=>$dataProvider]);
        }
    }
    public function actionLogout()
    {
        if(!Yii::$app->user->isGuest)
        {
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }
    }
    public function actionSignup()
    {
        $model = new Signup();
        if(isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');
            if($model->validate() && $model->signup())
            {
                return $this->goHome();
            }
        }
        return $this->render('signup',['model'=>$model]);
    }
    public function actionLogin()
    {
        if(!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }
        $login_model = new Login();
        if(Yii::$app->request->post('Login'))
        {
            $login_model->attributes = Yii::$app->request->post('Login');
            if($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }
            return $this->render('login',['login_model'=>$login_model]);
    }
    public function actionCreate()
    {
        $post_model = new Insert();
        if(isset($_POST['Insert']))
        {
            $post_model->attributes = Yii::$app->request->post('Insert');
            if($post_model->validate() && $post_model->insertPost())
            {
                return $this->goHome();
            }
        }
        return $this->render('create',['post_model'=>$post_model]);
    }
    public function actionView($id)
   {
       if(Yii::$app->user->isGuest)
       {
           return $this->redirect(['login']);
       }
       else
       {
           $dataProvider = $this->getRecords()->getModels();
           $data = $dataProvider[$id];
           return $this->render('detail',['data'=>$data]);
       }
    }
    private function getRecords()
    {
      return $dataProvider = new SqlDataProvider([
    'sql' => 'SELECT p.id,p.user_id,p.post_title,p.post_text,u.name ' .
             'FROM Posts p '.
             'INNER JOIN User u ' .
             'ON p.user_id = u.id'
]);
    }
}
