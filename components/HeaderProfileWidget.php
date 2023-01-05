<?php

namespace app\components;

use app\models\User;
use yii\base\Widget;
use app\models\Pages;
use Yii;
use app\models\Posts;


class HeaderProfileWidget extends Widget
{
    public function run()
    {
        $user = Yii::$app->user->identity->id;
        if($user)
        {
            $user_account = User::findOne($user);
            $page = Pages::findOne(['user_id' => $user]);
            $page = Pages::find()->where(['user_id' => $user])->with('friends', 'feeds')->one();
        }
        return $this->render('header-profile', compact('user' , 'page' , 'user_account') );
    }
}