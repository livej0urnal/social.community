<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Pages;
use app\models\Posts;
use app\models\User;
use app\models\Users;
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
                        'actions' => ['connections', 'fake', 'friend', 'delete-comment', 'delete-post'], // действия в контроллере
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
        $this->setMeta($page->page_name);
        return $this->render('friend', compact('page'));
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
            $post->delete();
        }

    }

    public function actionDeleteComment($id)
    {
        $id = Yii::$app->request->get('id');
        $user = Yii::$app->user->identity->id;
        $page = Pages::findOne(['user_id' => $user]);
        $comment = CommentPost::findOne($id);
        if($comment->page_id != $page->id || empty($comment))
        {
            return $this->goHome();
        }
        else{
            $comment->delete(false);
        }
    }

    public function actionFake()
    {
        $faker = Factory::create();

        for($i = 0; $i < 1000; $i++)
        {
            $comment = new CommentPost();
            $comment->post_id = rand(1,1000);
            $comment->page_id = rand(1, 1000);
            $comment->comment =  $faker->text(400);
            $comment->save(false);

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