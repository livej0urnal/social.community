<?php

namespace app\controllers;

use app\controllers\AppController;

class PageController extends AppController
{
    public function actionCreate()
    {
        return $this->render('create');
    }
}