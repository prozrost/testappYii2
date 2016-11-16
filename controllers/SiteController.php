<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Signup;
use app\models\Login;
use app\models\Posts;
use app\models\User;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
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
        $post_model = new Posts();
        if(isset($_POST['Posts']))
        {
            $post_model->attributes = Yii::$app->request->post('Posts');
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
        $model = Posts::find()->where(['id'=>$id])->with('user')->one();
        return $this->render('detail',['data'=>$model]);
       }
    }
    private function getRecords()
    {
     return  $dataProvider = new ActiveDataProvider([
              'query' => Posts::find()->joinWith('user')]);
    }
}
