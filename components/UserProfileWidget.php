<?php

namespace app\components;

use yii\base\Widget;
use Yii;
use app\models\Pages;
use app\models\User;

class UserProfileWidget extends Widget
{

    public function run()
    {
        $user = Yii::$app->user->identity->id;
        if($user)
        {
            $page = Pages::findOne(['user_id' => $user]);
        }
        return $this->render('user-profile', compact('page'));
    }
}