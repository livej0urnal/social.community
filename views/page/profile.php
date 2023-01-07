<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<!-- Container START -->
<div class="container">
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

            <!-- Share feed START -->
            <div class="card card-body">
                <div class="d-flex mb-3">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs me-2">
                        <a href="#"> <img class="avatar-img rounded-circle" src="/images/avatar/07.jpg" alt=""> </a>
                    </div>
                    <!-- Post input -->
                    <form class="w-100">
                        <input class="form-control pe-4 border-0" placeholder="Share your thoughts..."
                               data-bs-toggle="modal" data-bs-target="#modalCreateFeed">
                    </form>
                </div>
                <!-- Share feed toolbar START -->
                <ul class="nav nav-pills nav-stack small fw-normal">
                    <li class="nav-item">
                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal"
                           data-bs-target="#feedActionPhoto"> <i
                                    class="bi bi-image-fill text-success pe-2"></i>Photo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal"
                           data-bs-target="#feedActionVideo"> <i class="bi bi-camera-reels-fill text-info pe-2"></i>Video</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal"
                           data-bs-target="#modalCreateEvents"> <i
                                    class="bi bi-calendar2-event-fill text-danger pe-2"></i>Event </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal"
                           data-bs-target="#modalCreateFeed"> <i class="bi bi-emoji-smile-fill text-warning pe-2"></i>Feeling
                            /Activity</a>
                    </li>
                    <li class="nav-item dropdown ms-sm-auto">
                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#" id="feedActionShare"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare">
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Create a
                                    poll</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Ask a
                                    question </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"> <i
                                            class="bi bi-pencil-square fa-fw pe-2"></i>Help</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Share feed toolbar END -->
            </div>
            <!-- Share feed END -->
            <?php if (!empty($posts)) : ?>
                <!-- Card feed item START -->
                <?php foreach ($posts as $post) : ?>
                    <div class="card">
                        <!-- Card header START -->
                        <div class="card-header border-0 pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <div class="avatar me-2">
                                        <a href="<?= Url::to(['page/profile', 'id' => $post->page_id]) ?>">
                                            <?= Html::img($post->page->image, ['alt' => $post->page->display_name, 'class' => 'avatar-img rounded-circle']) ?>
                                        </a>
                                    </div>
                                    <!-- Info -->
                                    <div>
                                        <div class="nav nav-divider">
                                            <h6 class="nav-item card-title mb-0"><a
                                                        href="<?= Url::to(['page/profile', 'id' => $post->page_id]) ?>"> <?= $post->page->page_name ?> </a>
                                            </h6>
                                            <span class="nav-item small"> <?= $post->created_at ?> </span>
                                        </div>
                                        <p class="mb-0 small"><?= $post->page->category->title ?> </p>
                                    </div>
                                </div>
                                <!-- Card feed action dropdown START -->
                                <div class="dropdown">
                                    <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                                       id="cardFeedAction1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                    <?php if ($post->page_id === $page->id): ?>
                                        <!-- Card feed action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction1">
                                            <li>
                                                <a class="dropdown-item dropdown-post" href="#" data-id="<?= $post->id ?>">
                                                    <i class="bi bi-x-circle fa-fw pe-2"></i>
                                                    Delete post
                                                </a>
                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <!-- Card feed action dropdown END -->
                            </div>
                        </div>
                        <!-- Card header END -->
                        <!-- Card body START -->
                        <div class="card-body">
                            <p>
                                <?= $post->content ?>
                            </p>
                            <!-- Card img -->
                            <?= Html::img($post->image, ['class' => 'card-img']) ?>
                            <div class="mt-3"></div>
                            <!-- Add comment -->
                            <div class="d-flex mb-3">
                                <!-- Avatar -->
                                <div class="avatar avatar-xs me-2">
                                    <a href="#!"> <img class="avatar-img rounded-circle" src="/images/avatar/12.jpg"
                                                       alt=""> </a>
                                </div>
                                <!-- Comment box  -->
                                <form class="position-relative w-100">
                                    <textarea class="form-control pe-4 bg-light" rows="1"
                                              placeholder="Add a comment..."></textarea>
                                </form>
                            </div>
                            <?php $comments = $post->comments; ?>
                            <?php if(!empty($comments) ) : ?>
                            <!-- Comment wrap START -->
                            <ul class="comment-wrap list-unstyled">
                                <?php foreach ($comments as $comment) : ?>
                                <!-- Comment item START -->
                                <li class="comment-item">
                                    <div class="d-flex">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-xs">
                                            <a href="#!"><img class="avatar-img rounded-circle"
                                                              src="/images/avatar/05.jpg" alt=""></a>
                                        </div>
                                        <!-- Comment by -->
                                        <div class="ms-2">
                                            <div class="bg-light p-3 rounded">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1"><a href="#!"> Frances Guerrero </a></h6>
                                                </div>
                                                <p class="small mb-0">
                                                    <?= $comment->comment ?>
                                                </p>
                                            </div>
                                            <!-- Comment react -->
                                            <ul class="nav nav-divider pt-2 small">
                                                <li class="nav-item">
                                                    <?= $comment->created_at ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <!-- Comment item END -->
                                <?php endforeach; ?>
                            </ul>
                            <!-- Comment wrap END -->
                            <?php endif; ?>
                        </div>
                        <!-- Card body END -->
                    </div>
                <?php endforeach; ?>
                <?php echo LinkPager::widget([
                    'pagination' => $pages,
                    'options' => ['class' => 'pagination tab-paginations'],
                    'linkOptions' => ['class' => 'page-link'],
                ]); ?>
                <!-- Card feed item END -->
            <?php endif; ?>
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
</div>
<!-- Container END -->
