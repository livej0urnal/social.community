<?php

namespace app\controllers;

use app\controllers\AppController;
use Yii;
use app\models\Pages;
use yii\filters\AccessControl;

class MessageController extends AppController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['single'], // действия в контроллере
                'rules' => [ // правила к действиям
                    [
                        'allow' => true,
                        'actions' => [], // действия в контроллере
                        'roles' => ['?'], // Доступ к действиям только для не авторизованных пользователей
                    ],
                    [
                        'allow' => true,
                        'actions' => ['single'], // действия в контроллере
                        'roles' => ['@'], // Доступ к действиям только для авторизованных пользователей
                    ],
                ],
            ],
        ];
    }


    public function actionSingle($user)
    {
        $user = Yii::$app->user->identity->id;
        $page = Pages::findOne(['user_id' => $user]);
        if($user) {
            return $this->redirect('account/login');
        }
        else{
            return $this->render('single', compact('page' , 'user'));
        }

    }
}