<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

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
                $this->endCache();
            }
            ?>
            <!--            --><? //= \app\components\HeaderProfileWidget::widget() ?>

            <!-- Share feed START -->
            <div class="card card-body">
                <div class="d-flex mb-3">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs me-2">
                        <?= Html::img($page->image , ['alt' => $page->display_name, 'class' => 'avatar-img rounded-circle']) ?>
                    </div>
                    <!-- Post input -->
                    <?php $form = ActiveForm::begin(['id' => 'add-new-post', 'options' => ['class' => 'w-100', 'enctype' => 'multipart/form-data']]) ?>
                        <?= $form->field($new_post, 'content')->textarea(['rows' => '3', 'class' => 'form-control pe-4 border-0' , 'placeholder' => 'Share your thoughts...'])->label(false) ?>

                        <?= $form->field($new_post, 'imageFile')->fileInput(['class' => 'form-control pe-4 border-0 mt-2', 'placeholder' => 'Avatar'])->label(false) ?>
                    <?php ActiveForm::end() ?>
                </div>
                <!-- Share feed toolbar START -->
                <ul class="nav nav-pills nav-stack small fw-normal">
                    <li class="nav-item dropdown ms-sm-auto">
                        <button type="submit" class="btn btn-success-soft" onclick="$('#add-new-post').submit()">Submit</button>
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
                                                <a class="dropdown-item dropdown-post" href="#"
                                                   data-id="<?= $post->id ?>">
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
                                    <a href="<?= Url::to(['profile/friend', 'id' => $post->page->id]) ?>">
                                        <?= Html::img($post->page->image, ['class' => 'avatar-img rounded-circle']) ?>
                                    </a>
                                </div>

                                <?php $form = ActiveForm::begin(['id' => 'new-comment-'. $post->id , 'options' => ['class' => 'position-relative w-100'] ]) ?>

                                <input id="commentform-post_id" type="text" name="CommentForm[post_id]" value="<?= $post->id ?>" class="disabled hidden d-none">

                                <?= $form->field($new_comment, 'comment')->textarea(['rows' => '1', 'class' => 'form-control pe-4'])->label(false) ?>

                                <button type="submit" class="btn btn-sm btn-primary" style="float: right; margin-top: 5px;"><i class="bi bi-chat-left-text"></i></button>

                                <?php ActiveForm::end() ?>
                            </div>
                            <?php $comments = $post->comments; ?>
                            <?php if (!empty($comments)) : ?>
                            <!-- Comment wrap START -->
                            <ul class="comment-wrap list-unstyled">
                                <?php $i = 1;  foreach ($comments as $comment) : ?>
                                <!-- Comment item START -->
                                <li class="comment-item mt-2 <?php if($i > 3): ?> hidden-comment <?php endif; ?> ?>" data-post="<?= $post->id ?>">
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
                                                    <h6 class="mb-1"><a href="<?= Url::to(['profile/friend', 'id' => $comment->user->id]) ?>"> <?= $comment->user->page_name ?></a>
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
                                            <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                                               id="cardFeedAction1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>

                                                <!-- Card feed action dropdown menu -->
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction1">
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
                                <?php if(count($comments) > 2) : ?>
                                    <div class="border-0 pt-0 mt-2">
                                        <!-- Load more comments -->
                                        <a href="#!" role="button" data-value="<?= $post->id ?>" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center load-more-comments" data-bs-toggle="button" aria-pressed="true">
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
                <?php
                //кеш на час
                if ($this->beginCache('AboutPage', ['duration' => 3600])) {
                    echo \app\components\AboutProfileWidget::widget();
                    $this->endCache();
                }
                ?>
                <!--                --><? //= \app\components\AboutProfileWidget::widget() ?>

            </div>

        </div>
        <!-- Right sidebar END -->

    </div> <!-- Row END -->
</div>
<!-- Container END -->
