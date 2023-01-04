<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\ChangePassword;
use app\models\User;
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
                        'actions' => ['create', 'profile', 'edit'], // действия в контроллере
                        'roles' => ['@'], // Доступ к действиям только для авторизованных пользователей
                    ],
                ],
            ],
        ];
    }


    public function actionCreate()
    {
        $id = Yii::$app->request->get('id');
        $user_id = Yii::$app->user->identity->id;
        $page = Pages::findOne(['user_id' => $user_id]);
        if($page && $page->delete != 1) {
            return $this->redirect(['page/profile', 'id' => $page->id]);
        }
        else{
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

    public function actionEdit($id)
    {
        $id = Yii::$app->request->get('id');
        $user_id = Yii::$app->user->identity->id;
        $page = Pages::findOne($id);
        if($page->user_id != $user_id && $page->delete != 1) {
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        else{
            $model = Pages::findOne($id);
            if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){

                if($model->update()) {
                    Yii::$app->session->setFlash('success', 'saved profile');
                    $model = Pages::findOne($id);
                }
                else{
                    Yii::$app->session->setFlash('error', 'Error validation!');
                }

            }
            $change_password = new ChangePassword();
            $change_password->attributes = Yii::$app->request->post('changePassword');
            if($change_password->load(Yii::$app->request->post())) {
                $user = User::findOne($user_id);
                $user->setPassword($change_password->new_password);
                $user->save();
                Yii::$app->session->setFlash('success', 'Changed password success!');
                $change_password = new ChangePassword();
            }
            $this->setMeta('Settings : '. $page->page_name. ' ');
            return $this->render('edit', compact('page', 'model', 'change_password', 'user_id', 'page'));
        }
    }

    public function actionProfile($id)
    {
        $id = Yii::$app->request->get('id');
        $user_id = Yii::$app->user->identity->id;
        $page = Pages::findOne($id);
        if($page->user_id != $user_id && $page->delete != 1) {
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        else{

            $this->setMeta('Profile : '. $page->page_name. ' ');
            return $this->render('profile', compact('page'));
        }
    }
}