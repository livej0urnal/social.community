<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Pages;
use app\models\Posts;
use app\models\Users;
use Faker\Factory;
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
                        'actions' => ['connections', 'fake'], // действия в контроллере
                        'roles' => ['@'], // Доступ к действиям только для авторизованных пользователей
                    ],
                ],
            ],
        ];
    }

    public function actionConnections($user)
    {
        $user = Yii::$app->request->get('user');
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $page = Pages::findOne(['user_id' => $user]);
        $this->setMeta('Connections ');
        return $this->render('connections', compact('user'));
    }

    public function actionFake()
    {
        $faker = Factory::create();

        for($i = 0; $i < 300; $i++)
        {
            $user = new Users();
            $user->email = $faker->email();
            $password = $faker->password();
            $user->setPassword($password);
            $user->save(false);
        }
        die('Data generation is complete!');
    }
}