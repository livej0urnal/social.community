<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Category;
use Faker\Factory;
use Yii;

class NewsController extends AppController
{
    public function actionIndex()
    {
        $this->setMeta('Latest News ');
        return $this->render('index');
    }

    public function actionSingle($slug)
    {
        $slug = Yii::$app->request->get('slug');
        return $this->render('single');
    }

    public function actionFake()
    {
        $faker = Factory::create();
        for($i = 0; $i < 30; $i++){
            $category = new Category();
            $category->title = $faker->word();
            $category->save();
            //            $friends = new Friends();
//            $friends->page_id = 1;
//            $friends->friend_id = rand(1, 300);
//            $friends->save(false);
        }

        die('Data generation is complete!');

    }
}