<?php

namespace app\controllers;

use app\controllers\AppController;
use Yii;

class NewsController extends AppController
{
    public function actionIndex()
    {
        $this->setMeta('Latest News ');
        return $this->render('index');
    }
}