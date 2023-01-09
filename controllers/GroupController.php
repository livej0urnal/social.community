<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\CommentGroup;
use app\models\Groups;
use app\models\Pages;
use app\models\PostsGroup;
use app\models\Users;
use app\models\UsersGroup;
use Yii;
use yii\web\UploadedFile;

class GroupController extends AppController
{
    public function actionSingle($slug)
    {
        $slug = Yii::$app->request->get('slug');
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $group = Groups::find()->where(['slug' => $slug])->with('posts', 'users')->indexBy(['slug'])->one();
        $posts = PostsGroup::find()->where(['group_id' => $group->id])->with('page')->orderBy(['created_at' => SORT_DESC])->all();
//        $group = Groups::findOne(['slug' => $slug]);
        $new_comment = new CommentGroup();
        $user = Yii::$app->user->identity->id;
        $new_post = new PostsGroup();
        if(Yii::$app->request->isPost && $new_post->beforeValidate()){
            $new_post->imageFile = UploadedFile::getInstance($new_post, 'imageFile');
            $new_post->upload();
            if ($new_post->load(Yii::$app->request->post())){
                $new_post->content = $new_post->content;
                $new_post->group_id = $group->id;
                $new_post->page_id = $page->id;
                $new_post->save(false);
                $new_post = new PostsGroup();
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error', 'Error validation!');
            }

        }
        if($group->is_private == 1) {
            if($new_comment->load(Yii::$app->request->post())){
                $new_comment->validate();
                $comment = new CommentGroup();
                $comment->post_id = $new_comment->post_id;
                $comment->comment = $new_comment->comment;
                $user = Users::findOne($user);
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
            $page = Pages::findOne(['user_id' => $user]);
            $is_user = UsersGroup::find()->where(['group_id' => $group->id])->andWhere(['page_id' => $page->id])->one();
            if(!$is_user) {
                return $this->goHome();
            }
            else{
                if($new_comment->load(Yii::$app->request->post())){
                    $new_comment->validate();
                    $comment = new CommentGroup();
                    $comment->post_id = $new_comment->post_id;
                    $comment->comment = $new_comment->comment;
                    $user = Users::findOne($user);
                    $comment->page_id = $page->id;
                    $comment->save();
                    if($comment->save()) {
                        Yii::$app->session->setFlash('success', 'Comment send!');
                        return $this->refresh();
                    }
                    else{
                        Yii::$app->session->setFlash('error', 'Has error!');
                    }
                }
                $users = UsersGroup::find()->where(['group_id' => $group->id])->limit(10)->all();
                $this->setMeta($group->title);
                return $this->render('single', compact('group', 'users', 'page', 'posts', 'new_comment', 'new_post'));
            }
        }
        else{
            if($new_comment->load(Yii::$app->request->post())){
                $new_comment->validate();
                $comment = new CommentGroup();
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
            $page = Pages::findOne(['user_id' => $user]);
            $users = UsersGroup::find()->where(['group_id' => $group->id])->limit(10)->all();
            $this->setMeta($group->title);
            return $this->render('single', compact('group', 'users', 'page', 'posts', 'new_comment', 'new_post'));
        }


    }

    public function actionLeave($id)
    {
        $id = Yii::$app->request->get('id');
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $group = Groups::findOne($id);
        $user = Yii::$app->user->identity->id;
        $page = Pages::findOne(['user_id' => $user]);
        $user_group = UsersGroup::find()->where(['page_id' => $page->id])->andWhere(['group_id' => $id])->one();
        $user_group->delete();
        return $this->redirect(['profile/groups']);

    }

    public function actionDeletePost($id)
    {
        $id = Yii::$app->request->get('id');
        if(!Yii::$app->request->isAjax) {
            throw new HttpException(400, 'Only ajax request is allowed.');
        }
        $post = PostsGroup::findOne($id);
        $post->delete(false);
    }

    public function actionDeleteComment($id)
    {
        $id = Yii::$app->request->get('id');
        $user = Yii::$app->user->identity->id;
        $page = Pages::findOne(['user_id' => $user]);
        $comment = CommentGroup::findOne($id);
        $comment->delete(false);
    }

}