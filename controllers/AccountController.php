<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Users;
use Yii;

class AccountController extends AppController
{
    public function actionSignup()
    {
        $model =
        $this->setMeta('Sign up ');
        $this->layout = false;

        return $this->render('signup');
    }
}