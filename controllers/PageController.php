<?php

namespace app\controllers;

use app\controllers\AppController;
use Yii;
use app\models\Pages;
use yii\filters\AccessControl;

class PageController extends AppController
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
                        'actions' => ['create'], // действия в контроллере
                        'roles' => ['@'], // Доступ к действиям только для авторизованных пользователей
                    ],
                ],
            ],
        ];
    }


    public function actionCreate()
    {
        $model = new Pages();
        $model->user_id = Yii::$app->user->identity->id;
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){

            $model->save();
            if($model->save()) {
                Yii::$app->session->setFlash('success', 'New Profile saved!');
                return $this->goHome();
            }
            else{
                Yii::$app->session->setFlash('error', 'Error validation!');
            }

        }
        $this->setMeta('Create new page ');
        return $this->render('create', compact('model'));
    }
}