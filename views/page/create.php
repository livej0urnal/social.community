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
                    <label class="form-label">Category*</label>
                    <select class="form-select js-choice">
                        <option value="PV">Comedy</option>
                        <option value="PB">Technology</option>
                        <option value="PV">Education</option>
                        <option value="PV">Entertainment</option>
                        <option value="PV">Hotel</option>
                        <option value="PV">Travel</option>
                    </select>
                </div>
                <!-- Website URL -->
                <div class="col-sm-6">
                    <label class="form-label">Website URL</label>
                    <input type="text" class="form-control" placeholder="https://www.webestica.com">
                </div>
                <!-- Phone number -->
                <div class="col-lg-6">
                    <label class="form-label">Phone number</label>
                    <input type="text" class="form-control" placeholder="Phone number (Required)">
                </div>
                <!-- Page information -->
                <div class="col-12">
                    <label class="form-label">About page</label>
                    <textarea class="form-control" rows="3" placeholder="Description (Required)"></textarea>
                    <small>Character limit: 300</small>
                </div>

                <!-- Divider -->
                <hr>

                <!-- Social Links START -->
                <div class="col-12">
                    <h5 class="card-title mb-0">Social Links</h5>
                </div>
                <!-- Facebook -->
                <div class="col-sm-6">
                    <label  class="form-label">Facebook</label>
                    <div class="input-group">
                        <span class="input-group-text border-0"> <i class="bi bi-facebook text-facebook"></i> </span>
                        <input type="text" class="form-control" placeholder="https://www.facebook.com">
                    </div>
                </div>
                <!-- Twitter -->
                <div class="col-sm-6">
                    <label class="form-label">Twitter</label>
                    <div class="input-group">
                        <span class="input-group-text border-0"> <i class="bi bi-twitter text-twitter"></i> </span>
                        <input type="text" class="form-control" placeholder="https://www.twitter.com">
                    </div>
                </div>
                <!-- Instagram -->
                <div class="col-sm-6">
                    <label class="form-label">Instagram</label>
                    <div class="input-group">
                        <span class="input-group-text border-0"> <i class="bi bi-instagram text-instagram"></i> </span>
                        <input type="text" class="form-control" placeholder="https://www.instagram.com">
                    </div>
                </div>
                <!-- Pinterest -->
                <div class="col-sm-6">
                    <label class="form-label">Pinterest</label>
                    <div class="input-group">
                        <span class="input-group-text border-0"> <i class="bi bi-pinterest text-pinterest"></i> </span>
                        <input type="text" class="form-control" placeholder="https://www.pinterest.com">
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
