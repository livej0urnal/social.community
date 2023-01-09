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
        return $this->render('sidebar-profile');
    }
}