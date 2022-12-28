<?php

namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class AppController extends Controller
{

    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title . ' - Best Social App';
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }
}