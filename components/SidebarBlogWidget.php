<?php

namespace app\components;

use yii\base\Widget;
use app\models\Category;
use app\models\News;
use Yii;

class SidebarBlogWidget extends Widget
{
    public function run()
    {
        $categories = Category::find()->orderBy(['title' => SORT_DESC])->all();
        return $this->render('sidebar-blog', compact('categories'));
    }
}