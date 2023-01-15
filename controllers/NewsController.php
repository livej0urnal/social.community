<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Category;
use app\models\News;
use Faker\Factory;
use Yii;
use yii\filters\AccessControl;

class NewsController extends AppController
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
                        'actions' => ['index', 'single', 'fake'], // действия в контроллере
                        'roles' => ['@'], // Доступ к действиям только для авторизованных пользователей
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
        $categories = Category::find()->orderBy(['title' => SORT_DESC])->all();
        $this->setMeta('Latest News ');
        return $this->render('index', compact('categories'));
    }

    public function actionCategory($id)
    {
        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        $this->setMeta('Category ' . $category->title);
        return $this->render('category', compact('category'));
    }

    public function actionSingle($slug)
    {
        $slug = Yii::$app->request->get('slug');
        return $this->render('single');
    }

    public function actionFake()
    {
        $faker = Factory::create();
        for($i = 0; $i < 100; $i++){
//            $category = new Category();
//            $category->title = $faker->word();
//            $category->save();

//            $post = new News();
//            $post->slug = $faker->slug();
//            $post->title = $faker->jobTitle();
//            $post->content = $faker->text(400);
//            $post->category_id = rand(1,30);
//            $post->page_id = rand(1, 10);
//            $post->image = '/images/post/4by3/0'. rand(1,6) .'.jpg';
//            $new_date = $faker->dateTimeThisYear();
//            $post->public_date = $new_date->format('Y-m-d H:i:s');
//            $post->save();

        }

        die('Data generation is complete!');

    }
}