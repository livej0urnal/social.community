<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\CommentForm;
use app\models\Groups;
use app\models\Pages;
use app\models\Posts;
use app\models\User;
use app\models\Users;
use app\models\UsersGroup;
use Codeception\PHPUnit\Constraint\Page;
use Faker\Factory;
use Yii;
use yii\filters\AccessControl;
use app\models\Friends;
use app\models\Feeds;
use yii\data\Pagination;
use app\models\CommentPost;

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
                        'actions' => ['connections', 'fake', 'friend', 'delete-comment', 'delete-post', 'about', 'apply-friend', 'delete-friend', 'add-friend', 'groups'], // действия в контроллере
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
        $page = Pages::find()->where(['user_id' => $user])->one();
        $friends = Friends::find()->where(['page_id' => $page->id])->orderBy(['id' => SORT_DESC])->all();
        $query = Friends::find()->where(['page_id' => $page->id])->orderby(['id' => SORT_DESC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 20, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $friends = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('Connections ');
        return $this->render('connections', compact('user', 'page', 'friends', 'pages'));
    }

    public function actionFriend($id)
    {
        $id = Yii::$app->request->get('id');
        $page = Pages::find()->where(['id' => $id])->with('friends', 'feeds')->one();
        $user = Yii::$app->user->identity->id;
        $page_user = Pages::findOne(['user_id' => $user]);
        $posts = Posts::find()->where(['page_id' => $page->id])->with('comments')->all();
        $query = Posts::find()->where(['page_id' => $page->id])->with('comments')->orderby(['created_at' => SORT_DESC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 20, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        $new_comment = new CommentForm();
        if($new_comment->load(Yii::$app->request->post())){
            $new_comment->validate();
            $comment = new CommentPost();
            $comment->post_id = $new_comment->post_id;
            $comment->comment = $new_comment->comment;
            $comment->page_id = $page_user->id;
            $comment->save();
            if($comment->save()) {
                Yii::$app->session->setFlash('success', 'Comment send!');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error', 'Has error!');
            }
        }
        $friend = Friends::find()->where(['page_id' => $page_user->id])->andWhere(['friend_id' => $page->id])->one();
        $feed = Feeds::find()->where(['page_id' => $page_user->id])->andWhere(['feed_id' => $page->id])->one();
        $this->setMeta($page->page_name);
        return $this->render('friend', compact('page', 'posts', 'pages', 'page_user', 'new_comment', 'friend', 'feed'));
    }

    public function actionGroups()
    {
        $user = Yii::$app->user->identity->id;
        $page = Pages::find()->where(['user_id' => $user])->with('groups')->one();
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->setMeta('Groups');
        return $this->render('groups', compact('page', 'user'));

    }

    public function actionDeletePost($id)
    {
        $id = Yii::$app->request->get('id');
        $user = Yii::$app->user->identity->id;
        $page = Pages::findOne(['user_id' => $user]);
        $post = Posts::findOne($id);
        if($post->page_id != $page->id) {
            return $this->goHome();
        }
        else{
            $comments = CommentPost::find()->where(['post_id' => $post->id])->all();
            foreach ($comments as $comment) {
                $comment->delete();
            }
            $post->delete();
        }

    }

    public function actionDeleteComment($id)
    {
        $id = Yii::$app->request->get('id');
        $user = Yii::$app->user->identity->id;
        $page = Pages::findOne(['user_id' => $user]);
        $comment = CommentPost::findOne($id);
        if ($comment->page_id != $page->id || empty($comment)) {
            return $this->goHome();
        } else {
            $comment->delete(false);
        }
    }

    public function actionAbout($user)
    {
        $user = Yii::$app->request->get('user');
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $page = Pages::findOne(['user_id' => $user]);
        $this->setMeta($page->page_name . ' - About Page');
        return $this->render('about', compact('page'));

    }

    public function actionApplyFriend($id)
    {
        $id = Yii::$app->request->get('id');
        $user = Yii::$app->user->identity->id;
        $page = Pages::findOne(['user_id' => $user]);
        $feed = Feeds::find()->where(['page_id' => $page->id])->andWhere(['feed_id' => $id])->one();
        if($page->user_id != $user){
            return $this->goHome();
        }
        else{
            $friend = new Friends();
            $friend->page_id = $page->id;
            $friend->friend_id = $feed->feed_id;
            $friend->save();
            $friend = new Friends();
            $friend->page_id = $feed->feed_id;
            $friend->friend_id = $page->id;
            $friend->save();
            $feed->delete();
            $last_feed = Feeds::find()->where(['page_id' => $feed->feed_id])->andWhere(['feed_id' => $page->id])->one();
            $last_feed->delete(false);
            return $this->redirect(['profile/friend' , 'id' => $feed->feed_id]);
        }
    }

    public function actionDeleteFriend($id)
    {
        $id = Yii::$app->request->get('id');
        $user = Yii::$app->user->identity->id;
        $page = Pages::findOne(['user_id' => $user]);
        $friend = Friends::find()->where(['page_id' => $page->id])->andWhere(['friend_id' => $id])->one();
        if($page->user_id != $user){
            return $this->goHome();
        }
        else{
            $friend->delete(false);
            $friend = Friends::find()->where(['page_id' => $id])->andWhere(['friend_id' => $page->id])->one();
            if(!empty($friend)) {
                $friend->delete(false);
            }

        }
//        return $this->refresh();
    }

    public function actionAddFriend($id)
    {
        $id = Yii::$app->request->get('id');
        $user = Yii::$app->user->identity->id;
        $page_user = Pages::findOne(['user_id' => $user]);
        $feed = new Feeds();
        $feed->page_id = $id;
        $feed->feed_id = $page_user->id;
        $feed->save();
        $feed = new Feeds();
        return $this->goHome();
    }

    public function actionFake()
    {
        $faker = Factory::create();

        for($i = 0; $i < 300; $i++)
        {
//            $users = new UsersGroup();
//            $users->page_id = rand(1,100);
//            $users->group_id = rand(1,100);
//            $users->save(false);



//            $group = new Groups();
//            $group->image = '/images/logo/0'. rand(1,9) . '.svg';
//            $group->title = $faker->word();
//            $group->slug = $faker->slug(10);
//            $group->short = $faker->text(100);
//            $group->site = $faker->url();
//            $group->is_private = rand(0,1);
//            $group->admin = rand(1,20);
//            $group->background = '/images/bg/0'. rand(1,7). '.jpg';
//            $group->save(false);


//            $comment = new CommentPost();
//            $comment->post_id = rand(1,1000);
//            $comment->page_id = rand(1, 1000);
//            $comment->comment =  $faker->text(400);
//            $comment->save(false);

//            $post = new Posts();
//            $post->page_id = rand(1,300);
//            $post->content = $faker->text(300);
//            $post->image = '/images/post/3by2/'. rand(1,7) . '.jpg';
//            $post->save(false);

//            $friends = new Friends();
//            $friends->page_id = 1;
//            $friends->friend_id = rand(1, 300);
//            $friends->save(false);

//            $feed = new Feeds();
//            $feed->page_id = rand(1,300);
//            $feed->feed_id = rand(1,300);
//            $feed->save(false);

//            $user = new Users();
//            $user->email = $faker->email();
//            $password = $faker->password();
//            $user->setPassword($password);
//            $user->save(false);

//            $page = new Pages();
//            $page->user_id = rand(300, 600);
//            $page->page_name = $faker->name();
//            $page->display_name = $faker->text(30);
//            $page->email = $faker->email();
//            $page->website_url = $faker->url();
//            $page->category_id = rand(0, 5);
//            $page->phone_number = $faker->phoneNumber();
//            $page->about_page = $faker->text(100);
//            $page->image = '/images/avatar/' . rand(01, 14). '.jpg';
//            $page->save(false);
        }
        die('Data generation is complete!');
    }
}