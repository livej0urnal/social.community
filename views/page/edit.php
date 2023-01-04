<?php

use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>


<!-- Container START -->
<div class="container">
    <div class="row">

        <!-- Sidenav START -->
        <div class="col-lg-3">

            <!-- Advanced filter responsive toggler START -->
            <!-- Divider -->
            <div class="d-flex align-items-center mb-4 d-lg-none">
                <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <i class="btn btn-primary fw-bold fa-solid fa-sliders"></i>
                    <span class="h6 mb-0 fw-bold d-lg-none ms-2">Settings</span>
                </button>
            </div>
            <!-- Advanced filter responsive toggler END -->

            <nav class="navbar navbar-light navbar-expand-lg mx-0">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                    <!-- Offcanvas header -->
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                    </div>
                    <!--Setting Menu Widget-->
                    <?= \app\components\SettingProfileMenuWidget::widget() ?>

                </div>
            </nav>
        </div>
        <!-- Sidenav END -->

        <!-- Main content START -->
        <div class="col-lg-6 vstack gap-4">
            <!-- Setting Tab content START -->
            <div class="tab-content py-0 mb-0">

                <!-- Account setting tab START -->
                <div class="tab-pane show active fade" id="nav-setting-tab-1">
                    <!-- Account settings START -->
                    <div class="card mb-4">
                        <!-- Title START -->
                        <div class="card-header border-0 pb-0">
                            <h1 class="h5 card-title">Account Settings</h1>
                        </div>
                        <!-- Card header START -->
                        <?php Pjax::begin(['id' => 'ajax-create-profile']) ?>
                        <!-- Create a page form START -->
                        <div class="card-body">
                            <?php $form = ActiveForm::begin(['id' => 'create-clients', 'options' => ['data-pjax' => true, 'class' => 'row g-3', 'enctype' => 'multipart/form-data']]) ?>
                            <?php if (Yii::$app->session->hasFlash('success')): ?>
                                <div class="alert alert-success alert-dismissable" role="alert" style="color: green;">

                                    <?php echo Yii::$app->session->getFlash('success'); ?>
                                </div>
                            <?php endif; ?>
                            <!-- Page information -->
                            <div class="col-12">
                                <label class="form-label">Page name*</label>
                                <?= $form->field($model, 'page_name')->textInput(['class' => 'form-control', 'placeholder' => 'Page name'])->label(false) ?>
                                <small>Name that describes what the page is about.</small>
                            </div>
                            <!-- Display name -->
                            <div class="col-sm-6 col-lg-4">
                                <label class="form-label">Display name*</label>
                                <?= $form->field($model, 'display_name')->textInput(['class' => 'form-control', 'placeholder' => 'Display name'])->label(false) ?>
                            </div>
                            <!-- Email -->
                            <div class="col-sm-6 col-lg-4">
                                <label class="form-label">Email*</label>
                                <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'Email'])->label(false) ?>
                            </div>
                            <!-- Category -->
                            <div class="col-sm-6 col-lg-4">
                                <label class="form-label">Category*</label>
                                <?php echo $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\CategoryPages::find()->all(), 'id', 'title'))->label(false) ?>
                            </div>
                            <!-- Website URL -->
                            <div class="col-sm-6">
                                <label class="form-label">Website URL</label>
                                <?= $form->field($model, 'website_url')->textInput(['class' => 'form-control', 'placeholder' => 'https://www.site.com'])->label(false) ?>
                            </div>
                            <!-- Phone number -->
                            <div class="col-lg-6">
                                <label class="form-label">Phone number*</label>
                                <?= $form->field($model, 'phone_number')->textInput(['class' => 'form-control', 'placeholder' => 'Phone number'])->label(false) ?>
                            </div>
                            <!-- Page information -->
                            <div class="col-12">
                                <label class="form-label">About page</label>
                                <?= $form->field($model, 'about_page')->textarea(['rows' => '5'])->label(false) ?>
                                <small>Character limit: 400</small>
                            </div>

                            <!-- Divider -->
                            <hr>

                            <!-- Social Links START -->
                            <div class="col-12">
                                <h5 class="card-title mb-0">Social Links</h5>
                            </div>
                            <!-- Facebook -->
                            <div class="col-sm-6">
                                <label class="form-label">Linkedin</label>
                                <div class="input-group">
                                        <span class="input-group-text border-0"> <i
                                                    class="bi bi-linkedin text-linkedin"></i> </span>
                                    <?= $form->field($model, 'linkedin_link')->textInput(['class' => 'form-control', 'placeholder' => 'https://www.site.com'])->label(false) ?>
                                </div>
                            </div>
                            <!-- Twitter -->
                            <div class="col-sm-12">
                                <label class="form-label">Github</label>
                                <div class="input-group">
                                        <span class="input-group-text border-0"> <i
                                                    class="bi bi-github text-github"></i> </span>
                                    <?= $form->field($model, 'github_link')->textInput(['class' => 'form-control', 'placeholder' => 'https://www.site.com'])->label(false) ?>
                                </div>
                            </div>
                            <div class="card-header border-0 pb-0">
                                <h1 class="h5 card-title">Avatar Settings</h1>
                            </div>
                            <?php if($page->image) : ?>

                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <?= Html::img($page->image, ['class' => 'avatar-img rounded-circle border border-white border-3']) ?>

                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#" id="drop-avatar"
                                           class="mt-5 badge-danger text-danger text-decoration-underline"
                                           data-value="<?= $page->image ?>"
                                           data-page="<?= $page->id ?>">
                                            Delete avatar
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <!-- Avatar -->
                            <div class="col-sm-12">
                                <label class="form-label">Avatar</label>
                                <?= $form->field($model, 'imageFile')->fileInput(['class' => 'form-control', 'placeholder' => 'Avatar'])->label(false) ?>

                            </div>
                            <!-- Button  -->
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-success mb-0">Save</button>
                            </div>
                            <?php ActiveForm::end() ?>
                        </div>
                        <!-- Create a page form END -->
                        <?php Pjax::end() ?>
                    </div>
                    <!-- Account settings END -->

                    <!-- Change your password START -->
                    <div class="card">
                        <!-- Title START -->
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">Change your password</h5>
                        </div>
                        <!-- Title START -->
                        <div class="card-body">
                            <?php $form = ActiveForm::begin(['id' => 'changePassword']) ?>
                            <!-- Settings START -->
                            <!-- Current password -->
                            <div class="col-12 mt-3">
                                <label class="form-label">Current password</label>
                                <?= $form->field($change_password, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Current password'])->label(false) ?>
                            </div>

                            <div class="row">
                                <!-- Current password -->
                                <div class="col-6 mt-3">
                                    <label class="form-label">Current password</label>
                                    <?= $form->field($change_password, 'new_password')->passwordInput(['class' => 'form-control', 'placeholder' => 'New password'])->label(false) ?>
                                </div>
                                <!-- New password -->
                                <div class="col-6 mt-3">
                                    <label class="form-label">Confirm password</label>
                                    <!-- Input group -->
                                    <?= $form->field($change_password, 'new_password_repeat')->passwordInput(['class' => 'form-control', 'placeholder' => 'Confirm password'])->label(false) ?>
                                </div>
                            </div>

                            <!-- Button  -->
                            <div class="col-12 mt-3 text-end">
                                <button type="submit" class="btn btn-primary mb-0">Update password</button>
                            </div>
                            <!-- Settings END -->
                            <?php ActiveForm::end() ?>
                        </div>
                    </div>
                    <!-- Card END -->
                </div>
                <!-- Account setting tab END -->

                <!-- Close account tab START -->
                <div class="tab-pane fade" id="nav-setting-tab-6">
                    <!-- Card START -->
                    <div class="card">
                        <!-- Card header START -->
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">Delete account</h5>
                            <p class="mb-0">Deleted accounts can be restored.</p>
                            <?php if ($page->delete == '1'): ?>
                                <p class="mb-3 text-danger">You page is deleted!</p>
                            <?php endif; ?>
                        </div>
                        <!-- Card header START -->
                        <!-- Card body START -->
                        <div class="card-body">
                            <?php if ($page->delete == '1'): ?>
                                <a href="#" id="restore-account" data-id="<?= $page->id ?>"
                                   class="btn btn-warning btn-sm mb-0">Restore my account</a>
                            <?php else : ?>
                                <a href="<?= Url::to(['page/profile', 'id' => $page->id]) ?>"
                                   class="btn btn-success-soft btn-sm mb-2 mb-sm-0">Keep my account</a>
                                <a href="#" id="delete-account" data-id="<?= $page->id ?>"
                                   class="btn btn-danger btn-sm mb-0">Delete my account</a>
                            <?php endif; ?>
                            <!-- Delete END -->
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Card END -->
                </div>
                <!-- Close account tab END -->

            </div>
            <!-- Setting Tab content END -->
        </div>

    </div> <!-- Row END -->
</div>
<!-- Container END -->