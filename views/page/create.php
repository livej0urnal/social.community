<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use yii\widgets\Pjax;
?>
<!-- Main content START -->
<div class="col-md-12 col-lg-12 vstack gap-4">
    <!-- Create a page START -->
    <div class="card">
        <!-- Title START -->
        <div class="card-header border-0 pb-0">
            <h1 class="h4 card-title mb-0">Create Profile</h1>
        </div>
        <!-- Title END -->
        <?php Pjax::begin(['id' => 'ajax-create-profile']) ?>
        <!-- Create a page form START -->
        <div class="card-body">
            <?php $form = ActiveForm::begin(['id' => 'create-clients', 'options' => ['data-pjax' => true, 'class' => 'row g-3']]) ?>

            <form class="row g-3">
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
                    <?php echo $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\CategoryPages::find()->all(), 'id', 'title')) ?>
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
                    <label  class="form-label">Linkedin</label>
                    <div class="input-group">
                        <span class="input-group-text border-0"> <i class="bi bi-linkedin text-linkedin"></i> </span>
                        <?= $form->field($model, 'linkedin_link')->textInput(['class' => 'form-control', 'placeholder' => 'https://www.site.com'])->label(false) ?>
                    </div>
                </div>
                <!-- Twitter -->
                <div class="col-sm-12">
                    <label class="form-label">Github</label>
                    <div class="input-group">
                        <span class="input-group-text border-0"> <i class="bi bi-github text-github"></i> </span>
                        <?= $form->field($model, 'github_link')->textInput(['class' => 'form-control', 'placeholder' => 'https://www.site.com'])->label(false) ?>
                    </div>
                </div>
                <!-- Button  -->
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary mb-0">Create a page</button>
                </div>
            </form>
            <?php ActiveForm::end() ?>
        </div>
        <!-- Create a page form END -->
        <?php Pjax::end() ?>
    </div>
    <!-- Create a page END -->
</div>
