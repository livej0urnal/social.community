<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

?>
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
            $this->endCache(); }
        ?>
<!--        --><?//= \app\components\SidebarProfileWidget::widget() ?>
    </div>
    <!-- Sidenav END -->

    <!-- Main content START -->
    <div class="col-md-8 col-lg-6 vstack gap-4">

        <!-- Share feed START -->
        <div class="card card-body">
            <div class="d-flex mb-3">
                <!-- Avatar -->
                <div class="avatar avatar-xs me-2">
                    <?= Html::img($page->image, ['alt' => $page->display_name, 'class' => 'avatar-img rounded-circle']) ?>
                </div>
                <!-- Post input -->
                <?php $form = ActiveForm::begin(['id' => 'add-new-post-home', 'options' => ['class' => 'w-100', 'enctype' => 'multipart/form-data']]) ?>

                <?= $form->field($new_post, 'content')->textarea(['rows' => '3', 'class' => 'form-control pe-4 border-0', 'placeholder' => 'Share your thoughts...'])->label(false) ?>

                <?= $form->field($new_post, 'imageFile')->fileInput(['class' => 'form-control pe-4 border-0 mt-2', 'placeholder' => 'Avatar'])->label(false) ?>

                <?php ActiveForm::end() ?>
            </div>
            <!-- Share feed toolbar START -->
            <ul class="nav nav-pills nav-stack small fw-normal">
                <li class="nav-item dropdown ms-sm-auto">
                    <button type="submit" class="btn btn-success-soft" onclick="$('#add-new-post-home').submit()">
                        Submit
                    </button>
                </li>
            </ul>
            <!-- Share feed toolbar END -->
        </div>
        <!-- Share feed END -->
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
                                    <?php if ($post->page_id != $page->id): ?>
                                        <a href="<?= Url::to(['profile/friend', 'id' => $post->page->id]) ?>">
                                            <?= Html::img($post->page->image, ['alt' => $post->page->display_name, 'class' => 'avatar-img rounded-circle']) ?>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?= Url::to(['page/profile', 'id' => $post->page->id]) ?>">
                                            <?= Html::img($post->page->image, ['alt' => $post->page->display_name, 'class' => 'avatar-img rounded-circle']) ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <!-- Info -->
                                <div>
                                    <?php if ($post->page_id != $page->id): ?>
                                        <div class="nav nav-divider">
                                            <h6 class="nav-item card-title mb-0"><a
                                                        href="<?= Url::to(['profile/friend', 'id' => $post->page->id]) ?>"> <?= $post->page->page_name ?> </a>
                                            </h6>
                                            <span class="nav-item small"> <?= $post->created_at ?> </span>
                                        </div>
                                        <p class="mb-0 small"><?= $post->page->category->title ?> </p>
                                    <?php else: ?>
                                        <div class="nav nav-divider">
                                            <h6 class="nav-item card-title mb-0"><a
                                                        href="<?= Url::to(['page/profile', 'id' => $post->page->id]) ?>"> <?= $post->page->page_name ?> </a>
                                            </h6>
                                            <span class="nav-item small"> <?= $post->created_at ?> </span>
                                        </div>
                                        <p class="mb-0 small"><?= $post->page->category->title ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ($post->page_id === $page->id): ?>
                                <!-- Card feed action dropdown START -->
                                <div class="dropdown">
                                    <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                                       id="cardFeedAction1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </a>

                                    <!-- Card feed action dropdown menu -->
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction1">
                                        <li>
                                            <a class="dropdown-item dropdown-post" href="#"
                                               data-id="<?= $post->id ?>">
                                                <i class="bi bi-x-circle fa-fw pe-2"></i>
                                                Delete post
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                                <!-- Card feed action dropdown END -->
                            <?php endif; ?>
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
                                <a href="<?= Url::to(['profile/friend', 'id' => $page->id]) ?>">
                                    <?= Html::img($page->image, ['class' => 'avatar-img rounded-circle']) ?>
                                </a>
                            </div>

                            <?php $form = ActiveForm::begin(['id' => 'new-comment-' . $post->id, 'options' => ['class' => 'position-relative w-100']]) ?>

                            <input id="commentform-post_id" type="text" name="CommentForm[post_id]"
                                   value="<?= $post->id ?>" class="disabled hidden d-none">

                            <?= $form->field($new_comment, 'comment')->textarea(['rows' => '1', 'class' => 'form-control pe-4'])->label(false) ?>

                            <button type="submit" class="btn btn-sm btn-primary" style="float: right; margin-top: 5px;">
                                <i class="bi bi-chat-left-text"></i></button>

                            <?php ActiveForm::end() ?>
                        </div>
                        <?php $comments = $post->comments; ?>
                        <?php if (!empty($comments)) : ?>
                            <!-- Comment wrap START -->
                            <ul class="comment-wrap list-unstyled">
                                <?php $i = 1;
                                foreach ($comments as $comment) : ?>
                                    <!-- Comment item START -->
                                    <li class="comment-item mt-2 <?php if ($i > 3): ?> hidden-comment <?php endif; ?> ?>"
                                        data-post="<?= $post->id ?>">
                                        <div class="d-flex">
                                            <?php if ($comment->page_id != $page->id) : ?>
                                                <!-- Avatar -->
                                                <div class="avatar avatar-xs">
                                                    <a href="<?= Url::to(['profile/friend', 'id' => $comment->user->id]) ?>">
                                                        <?= Html::img($comment->user['image'], ['class' => 'avatar-img rounded-circle']) ?>
                                                    </a>
                                                </div>
                                                <!-- Comment by -->
                                                <div class="ms-2">
                                                    <div class="bg-light p-3 rounded">
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="mb-1"><a
                                                                        href="<?= Url::to(['profile/friend', 'id' => $comment->user->id]) ?>"> <?= $comment->user->page_name ?></a>
                                                            </h6>
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
                                            <?php else : ?>
                                                <!-- Avatar -->
                                                <div class="avatar avatar-xs">
                                                    <a href="<?= Url::to(['page/profile', 'id' => $comment->user->id]) ?>">
                                                        <?= Html::img($comment->user['image'], ['class' => 'avatar-img rounded-circle']) ?>
                                                    </a>
                                                </div>
                                                <!-- Comment by -->
                                                <div class="ms-2">
                                                    <div class="bg-light p-3 rounded">
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="mb-1"><a
                                                                        href="<?= Url::to(['page/profile', 'id' => $comment->user->id]) ?>"> <?= $comment->user->page_name ?></a>
                                                            </h6>
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
                                            <?php endif; ?>
                                            <?php if ($comment->page_id === $page->id): ?>
                                                <!-- Card feed action dropdown START -->
                                                <div class="dropdown">
                                                    <a href="#"
                                                       class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                                                       id="cardFeedAction1" data-bs-toggle="dropdown"
                                                       aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </a>

                                                    <!-- Card feed action dropdown menu -->
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="cardFeedAction1">
                                                        <li>
                                                            <a class="dropdown-item dropdown-comment" href="#"
                                                               data-id="<?= $comment->id ?>">
                                                                <i class="bi bi-x-circle fa-fw pe-2"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <!-- Card feed action dropdown END -->
                                            <?php endif; ?>
                                        </div>

                                    </li>
                                    <?php $i++; ?>
                                    <!-- Comment item END -->
                                <?php endforeach; ?>
                                <?php if (count($comments) > 2) : ?>
                                    <div class="border-0 pt-0 mt-2">
                                        <!-- Load more comments -->
                                        <a href="#!" role="button" data-value="<?= $post->id ?>"
                                           class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center load-more-comments"
                                           data-bs-toggle="button" aria-pressed="true">
                                            <div class="spinner-dots me-2">
                                                <span class="spinner-dot"></span>
                                                <span class="spinner-dot"></span>
                                                <span class="spinner-dot"></span>
                                            </div>
                                            Load more comments
                                        </a>
                                    </div>
                                <?php endif; ?>

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
    <div class="col-lg-3">
        <div class="row g-4">
            <?php if(!empty($feeds)) : ?>
            <!-- Card follow START -->
            <div class="col-sm-6 col-lg-12">
                <div class="card">
                    <!-- Card header START -->
                    <div class="card-header pb-0 border-0">
                        <h5 class="card-title mb-0">Who to follow</h5>
                    </div>
                    <!-- Card header END -->
                    <!-- Card body START -->
                    <div class="card-body">
                        <?php foreach ($feeds as $feed) : ?>
                        <!-- Connection item START -->
                        <div class="hstack gap-2 mb-3">
                            <!-- Avatar -->
                            <div class="avatar">
                                <a href="<?= Url::to(['profile/friend', 'id' => $feed->feed_id]) ?>">
                                    <?= Html::img($feed->feed->image, ['class' => 'avatar-img rounded-circle']) ?>
                                </a>
                            </div>
                            <!-- Title -->
                            <div class="overflow-hidden">
                                <a class="h6 mb-0" href="<?= Url::to(['profile/friend', 'id' => $feed->feed_id]) ?>"><?= $feed->feed->page_name ?> </a>
                                <p class="mb-0 small text-truncate"><?= $feed->feed->category->title ?></p>
                            </div>
                            <!-- Button -->
                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto apply-friend" data-value="<?= $feed->feed_id ?>" href="#"><i
                                        class="fa-solid fa-plus"> </i></a>
                        </div>
                        <!-- Connection item END -->
                        <?php endforeach; ?>
                    </div>
                    <!-- Card body END -->
                </div>
            </div>
            <!-- Card follow START -->
            <?php endif; ?>
            <?php if(!empty($latest_article)) : ?>
            <!-- Card News START -->
            <div class="col-sm-6 col-lg-12">
                <div class="card">
                    <!-- Card header START -->
                    <div class="card-header pb-0 border-0">
                        <h5 class="card-title mb-0">Today’s news</h5>
                    </div>
                    <!-- Card header END -->
                    <!-- Card body START -->
                    <div class="card-body">
                        <?php foreach ($latest_article as $article) : ?>
                        <!-- News item -->
                        <div class="mb-3">
                            <h6 class="mb-0"><a href="<?= Url::to(['news/single', 'slug' => $article->slug]) ?>"><?= $article->title ?></a>
                            </h6>
                            <small><?php echo Yii::$app->formatter->asDate($article->public_date, 'long'); ?></small>
                        </div>
                        <!-- News item -->
                        <?php endforeach; ?>
                        <!-- Load more comments -->
                        <a href="<?= Url::to(['news/index']) ?>" role="button"
                           class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center">
                            View all latest news
                        </a>
                    </div>
                    <!-- Card body END -->
                </div>
            </div>
            <!-- Card News END -->
            <?php endif; ?>
        </div>
    </div>
    <!-- Right sidebar END -->

</div> <!-- Row END -->