<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Pages;
use app\models\Posts;
use app\models\Users;
use Faker\Factory;
use Yii;
use yii\filters\AccessControl;
use app\models\Friends;
use app\models\Feeds;
use yii\data\Pagination;

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
                        'actions' => ['connections', 'fake', 'friend'], // действия в контроллере
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
//        $page = Pages::findOne(['user_id' => $user]);
        $page = Pages::find()->where(['user_id' => $user])->one();
        $friends = Friends::find()->where(['page_id' => $page->id])->orderBy(['id' => SORT_DESC])->limit(100)->all();

        $this->setMeta('Connections ');
        return $this->render('connections', compact('user', 'page', 'friends'));
    }

    public function actionFriend($id)
    {
        $id = Yii::$app->request->get('id');
        $page = Pages::find()->where(['id' => $id])->with('friends', 'feeds')->one();
        $this->setMeta($page->page_name);
        return $this->render('friend', compact('page'));
    }

    public function actionFake()
    {
        $faker = Factory::create();

        for($i = 0; $i < 1000; $i++)
        {
            $friends = new Friends();
            $friends->page_id = 2;
            $friends->friend_id = rand(1, 300);
            $friends->save(false);

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