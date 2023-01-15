<?php

namespace app\controllers;

use app\controllers\AppController;
use Faker\Factory;
use Yii;

class NewsController extends AppController
{
    public function actionIndex()
    {
        $this->setMeta('Latest News ');
        return $this->render('index');
    }

    public function actionSingle($slug)
    {
        $slug = Yii::$app->request->get('slug');
        return $this->render('single');
    }

    public function actionFake()
    {

    }
}