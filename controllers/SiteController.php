<?php

namespace app\controllers;

use app\models\CommentForm;
use app\models\CommentPost;
use app\models\Feeds;
use app\models\News;
use app\models\Pages;
use app\models\Posts;
use app\models\Users;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\controllers\AppController;
use yii\web\UploadedFile;

class SiteController extends AppController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'index'], // действия в контроллере
                'rules' => [ // правила к действиям
                    [
                        'allow' => true,
                        'actions' => ['login'], // действия в контроллере
                        'roles' => ['?'], // Доступ к действиям только для не авторизованных пользователей
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'index'], // действия в контроллере
                        'roles' => ['@'], // Доступ к действиям только для авторизованных пользователей
                    ],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $user = Yii::$app->user->identity->id;
        $page = Pages::findOne(['user_id' => Yii::$app->user->identity->id]);
        if($page) {
            $new_post = new Posts();
            if(Yii::$app->request->isPost && $new_post->beforeValidate()){
                $new_post->imageFile = UploadedFile::getInstance($new_post, 'imageFile');
                $new_post->upload();
                if ($new_post->load(Yii::$app->request->post())){
                    $new_post->content = $new_post->content;
                    $new_post->page_id = $page->id;
                    $new_post->save(false);
                    $new_post = new Posts();
                    return $this->refresh();
                }
                else{
                    Yii::$app->session->setFlash('error', 'Error validation!');
                }

            }
            $posts = Posts::find()->where(['page_id' => $page->id])->with('comments')->limit(10)->orderBy(['created_at' => SORT_DESC])->all();
            $query = Posts::find()->with('comments', 'page', 'page.category')->orderby(['created_at' => SORT_DESC]);
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
            $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
            $new_comment = new CommentForm();
            if($new_comment->load(Yii::$app->request->post())){
                $new_comment->validate();
                $comment = new CommentPost();
                $comment->post_id = $new_comment->post_id;
                $comment->comment = $new_comment->comment;
                $user = Users::findOne($user);
                $comment->page_id = $user->page->id;
                $comment->save();
                if($comment->save()) {
                    Yii::$app->session->setFlash('success', 'Comment send!');
                    return $this->refresh();
                }
                else{
                    Yii::$app->session->setFlash('error', 'Has error!');
                }
            }
            $feeds = Feeds::find()->where(['page_id' => $page->id])->limit(5)->all();
            $latest_article = News::find()->orderBy(['public_date' => SORT_DESC])->limit(5)->all();
            $this->setMeta('Social Community');
            return $this->render('index', compact('page', 'user', 'new_post', 'posts', 'new_comment', 'comment', 'pages', 'feeds', 'latest_article'));
        }
        else{
            $this->redirect('page/create');
        }

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        return $this->redirect('/login');
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
