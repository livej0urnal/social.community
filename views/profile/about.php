<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<div class="row g-4">

    <!-- Main content START -->
    <div class="col-lg-8 vstack gap-4">
        <?php
        //кеш на час
        if ($this->beginCache('HeaderProfile', ['duration' => 100])) {
            echo \app\components\HeaderProfileWidget::widget();
            $this->endCache(); }
        ?>
        <!--            --><?//= \app\components\HeaderProfileWidget::widget() ?>

        <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
                <h5 class="card-title"> Profile Info</h5>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                <div class="rounded border px-3 py-2 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6>About me</h6>
                    </div>
                    <p><?= $page->about_page ?></p>
                </div>
                <div class="row g-4">
                    <div class="col-sm-6">
                        <!-- Birthday START -->
                        <div class="d-flex align-items-center rounded border px-3 py-2">
                            <!-- Date -->
                            <p class="mb-0">
                                <i class="bi bi-linkedin fa-fw me-2"></i> Linkedin: <strong> <?= $page->linkedin_link ?> </strong>
                            </p>
                        </div>
                        <!-- Birthday END -->
                    </div>
                    <div class="col-sm-6">
                        <!-- Birthday START -->
                        <div class="d-flex align-items-center rounded border px-3 py-2">
                            <!-- Date -->
                            <p class="mb-0">
                                <i class="bi bi-github fa-fw me-2"></i> Github: <strong> <?= $page->github_link ?> </strong>
                            </p>
                        </div>
                        <!-- Birthday END -->
                    </div>
                    <div class="col-sm-6">
                        <!-- Designation START -->
                        <div class="d-flex align-items-center rounded border px-3 py-2">
                            <!-- Date -->
                            <p class="mb-0">
                                <i class="bi bi-briefcase fa-fw me-2"></i> <strong> <?= $page->category->title ?> </strong>
                            </p>
                        </div>
                        <!-- Designation END -->
                    </div>
                    <div class="col-sm-6">
                        <!-- Lives START -->
                        <div class="d-flex align-items-center rounded border px-3 py-2">
                            <!-- Date -->
                            <p class="mb-0">
                                <i class="bi bi-phone fa-fw me-2"></i> <strong> <?= $page->phone_number ?> </strong>
                            </p>
                        </div>
                        <!-- Lives END -->
                    </div>
                </div>
            </div>
            <!-- Card body END -->
        </div>
        <?php if(!empty($groups)) : ?>
        <div class="card">
            <!-- Card header START -->
            <div class="card-header d-sm-flex justify-content-between border-0 pb-0">
                <h5 class="card-title">Interests</h5>
                <a class="btn btn-primary-soft btn-sm" href="<?= Url::to(['profile/groups']) ?>"> See all</a>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                <div class="row g-4">
                    <?php foreach ($groups as $item) : ?>
                        <div class="col-sm-6 col-lg-4">
                        <!-- Interests item START -->
                        <div class="d-flex align-items-center position-relative">
                            <div class="avatar">
                                <?= Html::img($item->image, ['class' => 'avatar-img']) ?>
                            </div>
                            <div class="ms-2">
                                <h6 class="mb-0"> <a class="stretched-link" href="<?= Url::to(['group/single', 'slug' => $item->slug]) ?>"> <?= $item->title ?> </a></h6>
                                <p class="small mb-0">7,546,224 followers</p>
                            </div>
                        </div>
                        <!-- Interests item END -->
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Card body END -->
        </div>
        <?php endif; ?>

    </div>
    <!-- Main content END -->


    <!-- Right sidebar START -->
    <div class="col-lg-4">

        <div class="row g-4">
            <?php
            //кеш на час
            if ($this->beginCache('AboutPage', ['duration' => 100])) {
                echo \app\components\AboutProfileWidget::widget();
                $this->endCache(); }
            ?>
            <!--                --><?//= \app\components\AboutProfileWidget::widget() ?>

        </div>
    </div>
    <!-- Right sidebar END -->

</div> <!-- Row END -->
