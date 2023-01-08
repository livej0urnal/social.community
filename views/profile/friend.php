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
                            <p><b><?php echo count($page->feeds); ?> feed(s)</b></p>
                        </div>
                        <!-- Button -->
                        <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                            <button class="btn btn-sm btn-primary me-2" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Send message"><i
                                        class="bi bi-chat-left-text"></i></button>
                            <button class="btn btn-sm btn-danger me-2" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Remove friend"><i class="bi bi-person-x"></i>
                            </button>
                        </div>
                    </div>
                    <!-- List profile -->
                    <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                        <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> <?= $page->category->title ?></li>
                        <li class="list-inline-item"><i class="bi bi-github me-1"></i> <?= $page->github_link ?></li>
                        <li class="list-inline-item"><i class="bi bi-linkedin me-1"></i> <?= $page->linkedin_link ?></li>
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
                if ($this->beginCache('AboutPage', ['duration' => 100])) {
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