<?php

namespace app\components;

use yii\base\Widget;
use Yii;
use app\models\Pages;

class UserHeaderWidget extends Widget
{
    public function run()
    {
        $user = Yii::$app->user->identity->id;
        if($user)
        {
            $page = Pages::findOne(['user_id' => $user]);
        }
        return $this->render('header-user', compact('user' , 'page'));
    }
}