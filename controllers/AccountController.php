<?php

namespace app\controllers;

use app\controllers\AppController;

class AccountController extends AppController
{
    public function actionSignup()
    {
        $this->setMeta('Signup new User');
        $this->layout = false;

        return $this->render('signup');
    }
}