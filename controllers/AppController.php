<?php

namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class AppController extends Controller
{

    public function behaviors()
    {
        return[
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'site/index'],
                        'roles' => ['@'],
                    ],

                ]
            ]
        ];

    }

    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title . ' - Best Social App';
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }
}