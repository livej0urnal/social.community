<?php

namespace app\controllers;

use app\controllers\AppController;
use Yii;

class ActivityController extends AppController
{
    public function actionIndex()
    {
        $user = Yii::$app->user->identity->id;
        return $this->render('index');
    }
}