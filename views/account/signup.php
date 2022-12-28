<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AuthAppAsset;
use yii\widgets\ActiveForm;

AuthAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" data-theme="dark">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->registerCsrfMetaTags() ?>
    <!-- Meta Tags -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <?php $this->head() ?>
</head>

<body>

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- Container START -->
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 py-5">
            <!-- Main content START -->
            <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                <!-- Sign up START -->
                <div class="card card-body rounded-3 p-4 p-sm-5">
                    <div class="text-center">
                        <!-- Title -->
                        <h1 class="mb-2">Sign up</h1>
                        <span class="d-block">Already have an account? <a href="<?= \yii\helpers\Url::to(['account/login']) ?>">Sign in here</a></span>
                    </div>
                    <?php $form = ActiveForm::begin(['class' => 'mt-4']) ?>
                    <?php if(Yii::$app->session->hasFlash('success')): ?>
                        <div class="alert alert-success alert-dismissable" role="alert" style="color: green;">

                            <?php echo Yii::$app->session->getFlash('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if(Yii::$app->session->hasFlash('error')) : ?>
                        <div class="alert alert-success alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo Yii::$app->session->getFlash('error'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3 mt-3 input-group-lg">
                        <?= $form->field($model, 'email') ->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Enter email'])->label(false) ?>
                        <small>We'll never share your email with anyone else.</small>
                    </div>

                    <div class="mb-3 input-group-lg">
                        <?= $form->field($model, 'password') ->passwordInput(['class' => 'form-control', 'placeholder' => 'Enter new password'])->label(false) ?>
                        <small>Write your password...</small>
                    </div>

                    <div class="mb-3 input-group-lg">
                        <?= $form->field($model, 'password_repeat') ->passwordInput(['class' => 'form-control', 'placeholder' => 'Confirm password'])->label(false) ?>
                        <small>Password and repeat password must match</small>
                    </div>
                    <!-- Button -->
                    <div class="d-grid"><button type="submit" class="btn btn-lg btn-primary">Sign me up</button></div>
                    <!-- Copyright -->
                    <p class="mb-0 mt-3 text-center">Copyright ©<?= date('Y') ?> <a href="https://myprojects.company/ua/" target="_blank">My projects</a>. All rights reserved</p>
                    <?php ActiveForm::end() ?>
                </div>
                <!-- Sign up END -->
            </div>
        </div> <!-- Row END -->
    </div>
    <!-- Container END -->

</main>


<!-- **************** MAIN CONTENT END **************** -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>