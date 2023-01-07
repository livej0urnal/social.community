<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\ChangePassword;
use app\models\CommentForm;
use app\models\CommentPost;
use app\models\Friends;
use app\models\PostForm;
use app\models\User;
use app\models\Users;
use Yii;
use app\models\Pages;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;
use app\models\Posts;

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
                        'actions' => ['create', 'profile', 'edit', 'drop', 'restore', 'drop-image'], // действия в контроллере
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
        if($page || $page->delete == '1') {
            return $this->redirect(['page/profile', 'id' => $page->id]);
        }
        else{
            $model = new Pages();
            $model->user_id = Yii::$app->user->identity->id;
            if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){

                $model->save(false);
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
        if($page->user_id != $user_id) {
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        else{
            $model = Pages::findOne($id);
            if(Yii::$app->request->isAjax && Yii::$app->request->isPost){
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                $model->upload();
                if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
                    $model->update(false);
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
        if($page->user_id != $user_id || $page->delete == '1') {
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        else{
            $posts = Posts::find()->where(['page_id' => $page->id])->with('comments')->limit(10)->orderBy(['created_at' => SORT_DESC])->all();
            $query = Posts::find()->where(['page_id' => $page->id])->with('comments')->orderby(['created_at' => SORT_DESC]);
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 15, 'forcePageParam' => false, 'pageSizeParam' => false]);
            $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
            $new_comment = new CommentForm();
            if($new_comment->load(Yii::$app->request->post())){
                $new_comment->validate();
                $comment = new CommentPost();
                $comment->post_id = $new_comment->post_id;
                $comment->comment = $new_comment->comment;
                $user = Users::findOne($user_id);
                $comment->page_id = $user->page->id;
                $comment->save();
                if($comment->save()) {
                    Yii::$app->session->setFlash('success', 'Comment send!');
                    return $this->refresh();
                }
                else{
                    Yii::$app->session->setFlash('error', 'Has error!');
                }
            }
            $new_post = new PostForm();
            if(Yii::$app->request->isPost){
                $create_post = new Posts();
                $create_post->imageFile = UploadedFile::getInstance($new_post, 'image');
                $new_post->upload();
                if ($new_post->load(Yii::$app->request->post())){
                    $create_post->content = $new_post->content;
                    $create_post->image = $new_post->imageFile;
                    $create_post->page_id = $page->id;
                    $create_post->save();
                    $new_post = new PostForm();
                    Yii::$app->session->setFlash('success', 'saved profile');
                }
                else{
                    Yii::$app->session->setFlash('error', 'Error validation!');
                }

            }
            $this->setMeta('Profile : '. $page->page_name. ' ');
            return $this->render('profile', compact('page', 'posts', 'pages', 'new_comment', 'new_post'));
        }
    }

    public function actionDrop($id)
    {
        $id = Yii::$app->request->get('id');
        $user_id = Yii::$app->user->identity->id;
        $page = Pages::findOne($id);
        if($page->user_id != $user_id && $page->delete != '1') {
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        else{
            $page->delete = '1';
            $page->save();
            return $this->redirect('/site/logout');
        }
    }

    public function actionRestore($id)
    {
        $id = Yii::$app->request->get('id');
        $user_id = Yii::$app->user->identity->id;
        $page = Pages::findOne($id);
        if($page->user_id != $user_id && $page->delete != '1') {
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        else{
            $page->delete = null;
            $page->save();
            return $this->redirect('/site/index');
        }
    }

    public function actionDropImage($id, $image)
    {
        $id = Yii::$app->request->get('id');
        $image = Yii::$app->request->get('image');
        $user_id = Yii::$app->user->identity->id;
        $page = Pages::findOne($id);
        if($page->user_id != $user_id) {
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        else{
//            FileHelper::unlink($image);
            $page->image = null;
            $page->update(false);
            return $this->redirect(Yii::$app->request->referrer);

        }
    }
}