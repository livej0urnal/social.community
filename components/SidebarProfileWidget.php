<?php

namespace app\components;

use app\models\Pages;
use Yii;
use app\models\Users;
use yii\base\Widget;

class SidebarProfileWidget extends Widget
{
    public function run()
    {
        $user = Yii::$app->user->identity->id;
        $page = Pages::findOne(['user_id' => $user]);
        return $this->render('sidebar-profile', compact('page', 'user'));
    }
}