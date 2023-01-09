<?php

namespace app\components;

use app\models\Friends;
use app\models\Groups;
use app\models\User;
use yii\base\Widget;
use app\models\Pages;
use Yii;
use app\models\Posts;

class AboutProfileWidget extends Widget
{
    public function run()
    {
        $user = Yii::$app->user->identity->id;
        if($user)
        {
            $user_account = User::findOne($user);
            $page = Pages::findOne(['user_id' => $user]);
            $friends = Friends::find()->where(['page_id' => $page->id])->orderBy(['rand()' => SORT_DESC])->limit(12)->all();

        }
        $groups = Groups::find()->orderBy(['id' => SORT_DESC])->limit(10)->all();
        return $this->render('about-profile', compact('user' , 'page' , 'user_account' , 'friends', 'groups') );
    }
}