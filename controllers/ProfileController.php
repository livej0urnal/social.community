<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Pages;
use app\models\Posts;
use Yii;
use yii\filters\AccessControl;

class ProfileController extends AppController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['*'], // действия в контроллере
                'rules' => [ // правила к действиям
                    [
                        'allow' => true,
                        'actions' => ['*'], // действия в контроллере
                        'roles' => ['?'], // Доступ к действиям только для не авторизованных пользователей
                    ],
                    [
                        'allow' => true,
                        'actions' => ['connections'], // действия в контроллере
                        'roles' => ['@'], // Доступ к действиям только для авторизованных пользователей
                    ],
                ],
            ],
        ];
    }

    public function actionConnections($user)
    {
        $user = Yii::$app->user->identity->id;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $page = Pages::findOne(['user_id' => $user]);
    }
}