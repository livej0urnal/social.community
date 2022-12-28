<?php

namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class AppController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout'], // действия в контроллере
                'rules' => [ // правила к действиям
                    [
                        'allow' => true,
                        'actions' => ['login'], // действия в контроллере
                        'roles' => ['?'], // Доступ к действиям только для не авторизованных пользователей
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'], // действия в контроллере
                        'roles' => ['@'], // Доступ к действиям только для авторизованных пользователей
                    ],
                ],
            ],
        ];
    }

    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title . ' - Best Social App';
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }
}