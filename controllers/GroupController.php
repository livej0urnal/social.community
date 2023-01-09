<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\CommentGroup;
use app\models\Groups;
use app\models\Pages;
use app\models\PostsGroup;
use app\models\UsersGroup;
use Yii;

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
        if($group->is_private == 1) {
            $user = Yii::$app->user->identity->id;
            $page = Pages::findOne(['user_id' => $user]);
            $is_user = UsersGroup::find()->where(['group_id' => $group->id])->andWhere(['page_id' => $page->id])->one();
            if(!$is_user) {
                return $this->goHome();
            }
            else{

                $users = UsersGroup::find()->where(['group_id' => $group->id])->limit(10)->all();
                $this->setMeta($group->title);
                return $this->render('single', compact('group', 'users', 'page', 'posts', 'new_comment'));
            }
        }
        else{
            $page = Pages::findOne(['user_id' => $user]);
            $users = UsersGroup::find()->where(['group_id' => $group->id])->limit(10)->all();
            $this->setMeta($group->title);
            return $this->render('single', compact('group', 'users', 'page', 'posts', 'new_comment'));
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
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $post = PostsGroup::findOne($id);
        $post->delete();
        return $this->redirect(['group/single' , 'slug' => $post->group->slug]);
    }

}