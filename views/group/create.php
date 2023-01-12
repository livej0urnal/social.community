<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="row">

    <!-- Sidenav START -->
    <div class="col-lg-3">

        <!-- Advanced filter responsive toggler END -->
        <?php
        //кеш на час
        if ($this->beginCache('SidebarUser', ['duration' => 100])) {
            echo \app\components\SidebarProfileWidget::widget();
            $this->endCache();
        }
        ?>
        <!--        --><? //= \app\components\SidebarProfileWidget::widget() ?>
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
                        <h1 class="h5 card-title">Group Settings</h1>
                        <p class="mb-0">He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire
                            difficulty gay assistance joy. Unaffected at ye of compliment alteration to.</p>
                    </div>
                    <!-- Card header START -->
                    <!-- Card body START -->
                    <div class="card-body">
                        <?php $form = ActiveForm::begin(['id' => 'create-group', 'options' => ['class' => 'row g-3', 'enctype' => 'multipart/form-data']]) ?>
                        <!-- Slug name -->
                        <div class="col-sm-6 col-lg-4">
                            <label class="form-label">Slug</label>
                            <?= $form->field($model, 'slug')->textInput(['class' => 'form-control', 'placeholder' => 'Slug'])->label(false) ?>
                        </div>
                        <!-- Slug name -->
                        <div class="col-sm-6 col-lg-4">
                            <label class="form-label">Title</label>
                            <?= $form->field($model, 'title')->textInput(['class' => 'form-control', 'placeholder' => 'Title'])->label(false) ?>
                        </div>

                        <!-- Slug name -->
                        <div class="col-sm-6 col-lg-4">
                            <label class="form-label">Website</label>
                            <?= $form->field($model, 'site')->textInput(['class' => 'form-control', 'placeholder' => 'Website'])->label(false) ?>
                        </div>

                        <!-- Page information -->
                        <div class="col-12">
                            <label class="form-label">About Group</label>
                            <?= $form->field($model, 'short')->textarea(['rows' => '5'])->label(false) ?>
                            <small>Character limit: 400</small>
                        </div>

                        <!-- Divider -->
                        <hr>

                        <div class="col-12">
                            <?= $form->field($model, 'is_private')->checkbox(['0', '1',])->label(false) ?>
                        </div>

                        <!-- First name -->
                        <div class="col-sm-6 col-lg-6">
                            <label class="form-label">Logo</label>
                            <?= $form->field($model, 'imageFile')->fileInput(['class' => 'form-control', 'placeholder' => 'Logo'])->label(false) ?>
                        </div>

                        <?= $form->errorSummary($model) ?>

                        <!-- Button  -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-sm btn-primary mb-0">Save</button>
                        </div>
                        <?php ActiveForm::end() ?>
                        <!-- Form settings START -->
                    </div>
                    <!-- Card body END -->
                </div>
                <!-- Account settings END -->
            </div>
            <!-- Account setting tab END -->

        </div>
        <!-- Setting Tab content END -->
    </div>

</div>

