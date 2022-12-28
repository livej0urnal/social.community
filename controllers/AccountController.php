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
        if($model->validate() && $model->load()) {
            $model->signup();
            if($model->signup()) {
                Yii::$app->session->setFlash('success', 'Signup success!');
                return $this->redirect('account/login');
            }
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