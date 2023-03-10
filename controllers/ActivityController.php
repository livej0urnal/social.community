<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\News;
use app\models\Pages;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;

class ActivityController extends AppController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['*'], // действия в контроллере
                'rules' => [ // правила к действиям
                    [
                        'allow' => true,
                        'actions' => ['*'], // действия в контроллере
                        'roles' => ['?'], // Доступ к действиям только для не авторизованных пользователей
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'search'], // действия в контроллере
                        'roles' => ['@'], // Доступ к действиям только для авторизованных пользователей
                    ],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $user = Yii::$app->user->identity->id;
//        $page = Pages::findOne(['user_id' => $user]);
        $page = Pages::find()->where(['user_id' => $user])->with('feeds', 'feeds.feed')->one();
        if($page->user_id != $user) {
            return $this->goHome();
        }
        $this->setMeta('Notifications '. $page->page_name);
        return $this->render('index', compact('page'));
    }

    public function actionSearch($q)
    {
        $q = Yii::$app->request->get('q');
        $user = Yii::$app->user->identity->id;
        $user_page = Pages::find()->where(['user_id' => $user])->with('friends')->one();
        $pages = Pages::find()->filterWhere(['like', 'page_name', $q])->orFilterWhere(['like', 'display_name', $q])->all();
        $query = Pages::find()->filterWhere(['like', 'page_name', $q])->orFilterWhere(['like', 'display_name', $q])->orderby(['page_name' => SORT_ASC]);
        $counts = new Pagination(['totalCount' => $query->count(), 'pageSize' => 15, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $pages = $query->offset($counts->offset)->limit($counts->limit)->all();
        $this->setMeta('Results :' . $q);
        return $this->render('search', compact('q', 'pages', 'user_page', 'counts'));
    }
}