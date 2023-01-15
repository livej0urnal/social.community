<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<div class="container">
    <div class="row g-4">

        <!-- Sidenav START -->
        <div class="col-lg-3">

            <!-- Advanced filter responsive toggler START -->
            <div class="d-flex align-items-center d-lg-none">
                <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
                    <i class="btn btn-primary fw-bold fa-solid fa-sliders-h"></i>
                    <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
                </button>
            </div>
            <!-- Advanced filter responsive toggler END -->
            <?php
            //кеш на час
            if ($this->beginCache('SidebarUser', ['duration' => 100])) {
                echo \app\components\SidebarProfileWidget::widget();
                $this->endCache();
            }
            ?>
            <!--            --><? //= \app\components\SidebarProfileWidget::widget() ?>
        </div>
        <!-- Sidenav END -->

        <!-- Main content START -->
        <div class="col-md-8 col-lg-6 vstack gap-4">
            <!-- Card START -->
            <div class="card">
                <!-- Card header START -->
                <div class="card-header border-0 pb-0">
                    <div class="row g-2">
                        <div class="col-lg-12">
                            <!-- Card title -->
                            <h1 class="h4 card-title mb-lg-0">Results : <?= $q ?></h1>
                        </div>
                    </div>
                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                    <div class="tab-content mb-0 pb-0">
                        <?php if (!empty($pages)) : ?>
                            <div class="row g-3">
                                <?php foreach ($pages as $page) : ?>
                                    <div class="col-4">
                                        <!-- Friends item START -->
                                        <div class="card shadow-none text-center h-100">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-story avatar-xl">
                                                    <a href="<?= Url::to(['profile/friend', 'id' => $page->id]) ?>">
                                                        <?= Html::img($page->image, ['class' => 'avatar-img rounded-circle']) ?>
                                                    </a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3">
                                                    <a href="<?= Url::to(['profile/friend', 'id' => $page->id]) ?>">
                                                        <?= $page->page_name ?>
                                                    </a>
                                                </h6>
                                                <p class="mb-0 small lh-sm"></p>
                                            </div>
                                            <!-- Card footer -->
                                        </div>
                                        <!-- Friends item END -->
                                    </div>
                                <?php endforeach; ?>
                                <?php echo LinkPager::widget([
                                    'pagination' => $counts,
                                    'options' => ['class' => 'pagination tab-pagination d-inline-block d-md-flex justify-content-center'],
                                    'linkOptions' => ['class' => 'page-link'],
                                ]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Card body END -->
            </div>
            <!-- Card END -->
        </div>
        <!-- Right sidebar END -->

    </div> <!-- Row END -->
</div>
