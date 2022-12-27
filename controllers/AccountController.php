<?php

namespace app\controllers;

use app\controllers\AppController;

class AccountController extends AppController
{
    public function actionSignup()
    {
        $this->setMeta('Sign up ');
        $this->layout = false;

        return $this->render('signup');
    }
}