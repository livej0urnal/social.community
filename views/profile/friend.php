<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

?>


<!-- Container START -->
<div class="container">
    <div class="row g-4">
        <!-- Main content START -->
        <div class="col-lg-8 vstack gap-4">
            <!-- My profile START -->
            <div class="card">
                <!-- Cover image -->
                <div class="h-50px rounded-top pb-5"></div>
                <!-- Card body START -->
                <div class="card-body py-0 pb-3">
                    <div class="d-sm-flex align-items-start text-center text-sm-start">
                        <div>
                            <!-- Avatar -->
                            <div class="avatar avatar-xxl mt-n5 mb-3">
                                <?= Html::img($page->image, ['alt' => $page->display_name, 'class' => 'avatar-img rounded-circle border border-white border-3']) ?>
                            </div>
                        </div>
                        <div class="ms-sm-4 mt-sm-3">
                            <!-- Info -->
                            <h1 class="mb-0 h5"><?= $page->page_name ?></h1>
                            <p><?= $page->display_name ?></p>
                            <p><b><?php echo count($page->feeds); ?> feed(s)</b> /
                                <b><?php echo count($page->friends) ?> friends</b></p>
                        </div>
                        <!-- Button -->
                        <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                            <button class="btn btn-sm btn-primary me-2" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Send message"><i
                                        class="bi bi-chat-left-text"></i></button>
                            <?php if (!empty($friend)) : ?>
                                <button class="btn btn-sm btn-danger me-2" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Remove friend"><i class="bi bi-person-x"></i>
                                </button>
                            <?php else: ?>
                                <?php if(!empty($feed)) : ?>
                                    <a class="btn btn-primary rounded-circle icon-md ms-auto apply-friend" data-value="<?= $feed->feed_id ?>" href="#"><i class="bi bi-person-check-fill"> </i></a>
                                <?php else: ?>
                                <!-- Button -->
                                <a class="btn btn-primary-soft rounded-circle icon-md ms-auto add-friend"
                                   data-value="<?= $page->id ?>" href="#"><i
                                            class="fa-solid fa-plus"> </i></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- List profile -->
                    <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                        <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> <?= $page->category->title ?>
                        </li>
                        <li class="list-inline-item"><i class="bi bi-github me-1"></i> <?= $page->github_link ?></li>
                        <li class="list-inline-item"><i class="bi bi-linkedin me-1"></i> <?= $page->linkedin_link ?>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- My profile END -->

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
                                        <a href="<?= Url::to(['profile/friend', 'id' => $post->page_id]) ?>">
                                            <?= Html::img($post->page->image, ['alt' => $post->page->display_name, 'class' => 'avatar-img rounded-circle']) ?>
                                        </a>
                                    </div>
                                    <!-- Info -->
                                    <div>
                                        <div class="nav nav-divider">
                                            <h6 class="nav-item card-title mb-0"><a
                                                        href="<?= Url::to(['profile/friend', 'id' => $post->page_id]) ?>"> <?= $post->page->page_name ?> </a>
                                            </h6>
                                            <span class="nav-item small"> <?= $post->created_at ?> </span>
                                        </div>
                                        <p class="mb-0 small"><?= $post->page->category->title ?> </p>
                                    </div>
                                </div>
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
                                    <a href="<?= Url::to(['profile/friend', 'id' => $page_user->id]) ?>">
                                        <?= Html::img($page_user->image, ['class' => 'avatar-img rounded-circle']) ?>
                                    </a>
                                </div>
                                <?php $form = ActiveForm::begin(['id' => 'new-comment-' . $post->id, 'options' => ['class' => 'position-relative w-100']]) ?>

                                <input id="commentform-post_id" type="text" name="CommentForm[post_id]"
                                       value="<?= $post->id ?>" class="disabled hidden d-none">

                                <?= $form->field($new_comment, 'comment')->textarea(['rows' => '1', 'class' => 'form-control pe-4'])->label(false) ?>

                                <button type="submit" class="btn btn-sm btn-primary"
                                        style="float: right; margin-top: 5px;"><i class="bi bi-chat-left-text"></i>
                                </button>

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
        <div class="col-lg-4">

            <div class="row g-4">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h5 class="card-title">About</h5>
                        <!-- Button modal -->
                    </div>
                    <!-- Card body START -->
                    <div class="card-body position-relative pt-0">
                        <p><?= $page->about_page ?></p>
                    </div>
                    <!-- Card body END -->
                </div>

                <div class="card">
                    <!-- Card header START -->
                    <div class="card-header d-flex justify-content-between border-0">
                        <h5 class="card-title">Experience</h5>
                        <a class="btn btn-primary-soft btn-sm" href="#!"> <i class="fa-solid fa-plus"></i> </a>
                    </div>
                    <!-- Card header END -->
                    <!-- Card body START -->
                    <div class="card-body position-relative pt-0">
                        <!-- Experience item START -->
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar me-3">
                                <a href="#!"> <img class="avatar-img rounded-circle" src="/images/logo/08.svg" alt="">
                                </a>
                            </div>
                            <!-- Info -->
                            <div>
                                <h6 class="card-title mb-0"><a href="#!"> Apple Computer, Inc. </a></h6>
                                <p class="small">May 2015 – Present Employment Duration 8 mos <a
                                            class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                            </div>
                        </div>
                        <!-- Experience item END -->

                        <!-- Experience item START -->
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar me-3">
                                <a href="#!"> <img class="avatar-img rounded-circle" src="/images/logo/09.svg" alt="">
                                </a>
                            </div>
                            <!-- Info -->
                            <div>
                                <h6 class="card-title mb-0"><a href="#!"> Microsoft Corporation </a></h6>
                                <p class="small">May 2017 – Present Employment Duration 1 yrs 5 mos <a
                                            class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                            </div>
                        </div>
                        <!-- Experience item END -->

                        <!-- Experience item START -->
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar me-3">
                                <a href="#!"> <img class="avatar-img rounded-circle" src="/images/logo/10.svg" alt="">
                                </a>
                            </div>
                            <!-- Info -->
                            <div>
                                <h6 class="card-title mb-0"><a href="#!"> Tata Consultancy Services. </a></h6>
                                <p class="small mb-0">May 2022 – Present Employment Duration 6 yrs 10 mos <a
                                            class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                            </div>
                        </div>
                        <!-- Experience item END -->

                    </div>
                    <!-- Card body END -->
                </div>

            </div>

        </div>
        <!-- Right sidebar END -->

    </div> <!-- Row END -->
</div>
<!-- Container END -->