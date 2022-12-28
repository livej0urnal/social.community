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
        $this->setMeta('Sign up ');
        $this->layout = false;

        return $this->render('signup', compact('model'));
    }

    public function actionLogin()
    {
        return $this->render('login');
    }
}