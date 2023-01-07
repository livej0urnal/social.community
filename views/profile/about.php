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
        if ($this->beginCache('HeaderProfile', ['duration' => 3600])) {
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
            </div>
            <!-- Card body END -->
        </div>

        <div class="card">
            <!-- Card header START -->
            <div class="card-header d-sm-flex justify-content-between border-0 pb-0">
                <h5 class="card-title">Interests</h5>
                <a class="btn btn-primary-soft btn-sm" href="#!"> See all</a>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-sm-6 col-lg-4">
                        <!-- Interests item START -->
                        <div class="d-flex align-items-center position-relative">
                            <div class="avatar">
                                <img class="avatar-img" src="assets/images/logo/04.svg" alt="">
                            </div>
                            <div class="ms-2">
                                <h6 class="mb-0"> <a class="stretched-link" href="#"> Oracle </a></h6>
                                <p class="small mb-0">7,546,224 followers</p>
                            </div>
                        </div>
                        <!-- Interests item END -->
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <!-- Interests item START -->
                        <div class="d-flex align-items-center position-relative">
                            <div class="avatar">
                                <img class="avatar-img" src="assets/images/logo/13.svg" alt="">
                            </div>
                            <div class="ms-2">
                                <h6 class="mb-0"> <a class="stretched-link" href="#"> Apple </a></h6>
                                <p class="small mb-0">102B followers</p>
                            </div>
                        </div>
                        <!-- Interests item END -->
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <!-- Interests item START -->
                        <div class="d-flex align-items-center position-relative">
                            <div class="avatar">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/placeholder.jpg" alt="">
                            </div>
                            <div class="ms-2">
                                <h6 class="mb-0"> <a class="stretched-link" href="#"> Elon musk </a></h6>
                                <p class="small mb-0"> CEO and Product Architect of Tesla, Inc 41B followers</p>
                            </div>
                        </div>
                        <!-- Interests item END -->
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <!-- Interests item START -->
                        <div class="d-flex align-items-center position-relative">
                            <div class="avatar">
                                <img class="avatar-img" src="assets/images/events/04.jpg" alt="">
                            </div>
                            <div class="ms-2">
                                <h6 class="mb-0"> <a class="stretched-link" href="#"> The X Factor </a></h6>
                                <p class="small mb-0">9,654 followers</p>
                            </div>
                        </div>
                        <!-- Interests item END -->
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <!-- Interests item START -->
                        <div class="d-flex align-items-center position-relative">
                            <div class="avatar">
                                <img class="avatar-img rounded-circle" src="assets/images/logo/12.svg" alt="">
                            </div>
                            <div class="ms-2">
                                <h6 class="mb-0"> <a class="stretched-link" href="#"> Getbootstrap </a></h6>
                                <p class="small mb-0">8,457,224 followers</p>
                            </div>
                        </div>
                        <!-- Interests item END -->
                    </div>
                </div>
            </div>
            <!-- Card body END -->
        </div>

    </div>
    <!-- Main content END -->


    <!-- Right sidebar START -->
    <div class="col-lg-4">

        <div class="row g-4">
            <?php
            //кеш на час
            if ($this->beginCache('AboutPage', ['duration' => 3600])) {
                echo \app\components\AboutProfileWidget::widget();
                $this->endCache(); }
            ?>
            <!--                --><?//= \app\components\AboutProfileWidget::widget() ?>

        </div>
    </div>
    <!-- Right sidebar END -->

</div> <!-- Row END -->
