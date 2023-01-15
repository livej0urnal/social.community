<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Pages;
use Yii;

class ActivityController extends AppController
{
    public function actionIndex()
    {
        $user = Yii::$app->user->identity->id;
//        $page = Pages::findOne(['user_id' => $user]);
        $page = Pages::find()->where(['user_id' => $user])->with('feeds')->one();
        if($page->user_id != $user) {
            return $this->goHome();
        }
        $this->setMeta('Notifications '. $page->page_name);
        return $this->render('index', compact('page'));
    }
}