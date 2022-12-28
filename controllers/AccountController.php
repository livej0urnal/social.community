<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Signup;
use app\models\Users;
use Yii;

class AccountController extends AppController
{
    public function actionSignup()
    {
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
        return $this->render('login');
    }
}