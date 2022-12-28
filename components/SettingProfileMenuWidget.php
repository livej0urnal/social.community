<?php

namespace app\components;

use app\models\Pages;
use yii\base\Widget;
use Yii;

class SettingProfileMenuWidget extends Widget
{
    public function run()
    {
        $user = Yii::$app->user->identity->id;
        $user_profile = Pages::findOne(['user_id' => $user]);
        return $this->render('setting-profile-menu', compact('user', 'user_profile'));
    }
}