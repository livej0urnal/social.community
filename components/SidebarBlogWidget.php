<?php

namespace app\components;

use app\models\Pages;
use yii\base\Widget;
use app\models\Category;
use app\models\News;
use Yii;

class SidebarBlogWidget extends Widget
{
    public function run()
    {
        $user = Yii::$app->user->identity->id;
        $page = Pages::find()->where(['user_id' => $user])->with('feeds')->one();
        $posts = News::find()->where(['!=', 'page_id', $page->id])->orderBy(['rand()' => SORT_DESC])->limit(5)->all();
        $categories = Category::find()->orderBy(['title' => SORT_DESC])->all();
        return $this->render('sidebar-blog', compact('categories', 'page', 'posts'));
    }
}