<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
?>

<div class="row g-4">

    <!-- Main content START -->
    <div class="col-lg-8 vstack gap-4">
        <?= \app\components\HeaderProfileWidget::widget() ?>

        <!-- Card Connections START -->
        <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
                <h5 class="card-title"> Connections</h5>
            </div>
            <?php if(!empty($friends)) : ?>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                <?php foreach ($friends as $friend) : ?>
                <!-- Connections Item -->
                <div class="d-md-flex align-items-center mb-4">
                    <!-- Avatar -->
                    <div class="avatar me-3 mb-3 mb-md-0">
                        <a href="<?= \yii\helpers\Url::to(['profile/friend' , 'id' => $friend->page->id]) ?>">
                            <?= Html::img($friend->page->image, ['alt' => $friend->page->display_name, 'class' => 'avatar-img rounded-circle']) ?>
                        </a>
                    </div>
                    <!-- Info -->
                    <div class="w-100">
                        <div class="d-sm-flex align-items-start">
                            <h6 class="mb-0"><a href="<?= \yii\helpers\Url::to(['profile/friend' , 'id' => $friend->page->id]) ?>"><?= $friend->page->page_name ?> </a></h6>
                            <p class="small ms-sm-2 mb-0">Full Stack Web Developer</p>
                        </div>
                        <!-- Connections START -->
                        <ul class="avatar-group mt-1 list-unstyled align-items-sm-center">
                            <li class="avatar avatar-xxs">
                                <img class="avatar-img rounded-circle" src="/images/avatar/01.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xxs">
                                <img class="avatar-img rounded-circle" src="/images/avatar/02.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xxs">
                                <img class="avatar-img rounded-circle" src="/images/avatar/03.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xxs">
                                <img class="avatar-img rounded-circle" src="/images/avatar/04.jpg" alt="avatar">
                            </li>
                            <li class="avatar avatar-xxs">
                                <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+2</span></div>
                            </li>
                            <li class="small ms-3">
                                Carolyn Ortiz, Frances Guerrero, and 20 other shared connections
                            </li>
                        </ul>
                        <!-- Connections END -->
                    </div>
                    <!-- Button -->
                    <div class="ms-md-auto d-flex">
                        <button class="btn btn-danger-soft btn-sm mb-0 me-2"> Remove </button>
                        <button class="btn btn-primary-soft btn-sm mb-0"> Message </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- Card body END -->
            <?php endif; ?>
        </div>
        <!-- Card Connections END -->

    </div>
    <!-- Main content END -->


    <!-- Right sidebar START -->
    <div class="col-lg-4">

        <div class="row g-4">

            <?= \app\components\AboutProfileWidget::widget() ?>

        </div>
    </div>
    <!-- Right sidebar END -->

</div> <!-- Row END -->
