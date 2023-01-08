<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Groups;
use app\models\UsersGroup;
use Yii;

class GroupController extends AppController
{
    public function actionSingle($slug)
    {
        $slug = Yii::$app->request->get('slug');
        $group = Groups::findOne(['slug' => $slug]);
        return $this->render('single', compact('group'));
    }

}