<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Pages;
use app\models\Signup;
use app\models\Users;
use app\models\Login;
use Yii;
use yii\filters\AccessControl;

class AccountController extends AppController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['signup', 'login'], // действия в контроллере
                'rules' => [ // правила к действиям
                    [
                        'allow' => true,
                        'actions' => ['login'], // действия в контроллере
                        'roles' => ['?'], // Доступ к действиям только для не авторизованных пользователей
                    ],
                    [
                        'allow' => true,
                        'actions' => [], // действия в контроллере
                        'roles' => ['@'], // Доступ к действиям только для авторизованных пользователей
                    ],
                ],
            ],
        ];
    }

    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Signup();
        $model->attributes = Yii::$app->request->post('Signup');
        if($model->validate() && $model->signup()) {
            $model = new Signup();
            Yii::$app->session->setFlash('success', 'Signup success!');
            return $this->redirect('account/login');

        }
        else{
            Yii::$app->session->setFlash('error', 'Error');
        }
        $this->setMeta('Sign up ');
        $this->layout = false;

        return $this->render('signup', compact('model'));
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Login();
        if(Yii::$app->request->post('Login')) {
            $model->attributes = Yii::$app->request->post('Login');
            if ($model->validate()) {
                Yii::$app->user->login($model->getUser());
                $page = Pages::findOne(['user_id' => Yii::$app->user->identity->id]);
                if($page) {
                    return $this->goHome();
                }
                else{
                    return $this->redirect(['page/create']);
                }

            }

        }
        $this->setMeta('Sign in ');
        $this->layout = false;
        return $this->render('login', compact('model'));
    }
}