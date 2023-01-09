<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="row g-4">

        <!-- Sidenav START -->
        <div class="col-lg-3">

            <!-- Advanced filter responsive toggler START -->
            <div class="d-flex align-items-center d-lg-none">
                <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
                    <i class="btn btn-primary fw-bold fa-solid fa-sliders-h"></i>
                    <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
                </button>
            </div>
            <!-- Advanced filter responsive toggler END -->
            <!-- Advanced filter responsive toggler END -->
            <?php
            //кеш на час
            if ($this->beginCache('SidebarUser', ['duration' => 100])) {
                echo \app\components\SidebarProfileWidget::widget();
                $this->endCache(); }
            ?>
            <!--            --><?//= \app\components\SidebarProfileWidget::widget() ?>
        </div>
        <!-- Sidenav END -->

        <!-- Main content START -->
        <div class="col-md-8 col-lg-9 vstack gap-4">
            <!-- Card START -->
            <div class="card">
                <!-- Card body START -->
                <div class="card-body">
                    <div class="d-md-flex flex-wrap align-items-start text-center text-md-start">
                        <div class="mb-2">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl">
                                <?= Html::img($group->image, ['class' => 'avatar-img border-0']) ?>
                            </div>
                        </div>
                        <div class="ms-md-4 mt-3">
                            <!-- Info -->
                            <h1 class="h5 mb-0"><?= $group->title ?> <i class="bi bi-patch-check-fill text-success small"></i></h1>
                            <ul class="nav nav-divider justify-content-center justify-content-md-start">
                                <?php if($group->is_private != 1): ?>
                                    <li class="nav-item"> Public group </li>
                                <?php else : ?>
                                    <li class="nav-item"> Private group </li>
                                <?php endif; ?>

                                <li class="nav-item"> <?php echo count($group->users) ?> members </li>
                            </ul>
                        </div>
                        <!-- Button -->
                        <div class="d-flex justify-content-center justify-content-md-start align-items-center mt-3 ms-lg-auto">
                            <button class="btn btn-sm btn-primary-soft me-2" type="button"> <i class="bi bi-person-check-fill pe-1"></i> Joined</button>
                            <button class="btn btn-sm btn-success me-2" type="button"> <i class="fa-solid fa-plus pe-1"></i> Invite</button>
                            <?php if($group->admin != $page->id) : ?>
                            <?php else: ?>
                            <div class="dropdown">
                                <!-- Group share action menu -->
                                <button class="icon-sm btn btn-dark-soft" type="button" id="groupAction" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <!-- Group share action dropdown menu -->
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="groupAction" style="">
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Share profile in a message</a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-file-earmark-pdf fa-fw pe-2"></i>Save your profile to PDF</a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-lock fa-fw pe-2"></i>Lock profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Profile settings</a></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if(!empty($users) && $group->is_private != 1) : ?>
                    <!-- Join group START -->
                    <ul class="avatar-group list-unstyled justify-content-center justify-content-md-start align-items-center mb-0 mt-3 flex-wrap">
                        <?php foreach ($users as $item) : ?>
                            <li class="avatar avatar-xs">
                                <?= Html::img($item->page->image, ['class' => 'avatar-img rounded-circle']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- Join group END -->
                    <?php endif; ?>
                </div>
            </div>
            <!-- Card END -->

            <div class="tab-content pt-0 pb-0 mb-0">

                <!-- Gruop Feed tab START -->
                <div class="tab-pane fade active show" id="group-tab-1">
                    <div class="row g-4">
                        <div class="col-lg-8 vstack gap-4">
                            <?php if(!empty($posts)) : ?>
                                <?php foreach ($posts as $post) : ?>
                                    <!-- Card feed item START -->
                                    <div class="card">
                                        <!-- Card header START -->
                                        <div class="card-header border-0 pb-0">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <!-- Avatar -->
                                                    <div class="avatar me-2">
                                                        <a href="#">
                                                            <?= Html::img($group->image, ['class' => 'avatar-img rounded-circle']) ?>
                                                        </a>
                                                    </div>
                                                    <!-- Info -->
                                                    <div>
                                                        <div class="nav nav-divider">
                                                            <h6 class="nav-item card-title mb-0"><a
                                                                        href="#"> <?= $group->title ?> </a>
                                                            </h6>
                                                            <span class="nav-item small"> <?= $post->created_at ?> </span>
                                                        </div>
                                                        <?php if($group->is_private != 1) : ?>
                                                        <p class="mb-0 small"><?= $post->page->page_name ?> </p>
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
                                    <!-- Card feed item END -->
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-4">
                            <!-- About START -->
                            <div class="card">
                                <!-- Title -->
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title">About</h5>
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <p><?= $group->short ?></p>
                                    <!-- info -->
                                    <ul class="list-unstyled mt-3 mb-0">
                                        <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> People: <strong> <?php echo count($group->users); ?> Members </strong> </li>
                                        <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status:
                                            <?php if($group->is_private != 1): ?>
                                                <strong> Public </strong>
                                            <?php else : ?>
                                                <strong> Private </strong>
                                            <?php endif; ?>

                                        </li>
                                        <li class="mb-2"> <i class="bi bi-globe2 fa-fw pe-1"></i> <strong>www.webestica.com </strong> </li>
                                    </ul>
                                </div>
                                <!-- Card body END -->
                            </div>
                            <!-- About END -->
                        </div>
                    </div>
                </div>
                <!-- Gruop Feed tab END -->
            </div>

        </div>
    </div> <!-- Row END -->
</div>
