<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

    <!-- Card START -->
    <div class="col-md-6 col-lg-12">
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
    </div>
    <!-- Card END -->
<?php if (!empty($groups)) : ?>
    <!-- Card START -->
    <div class="col-md-6 col-lg-12">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header d-flex justify-content-between border-0">
                <h5 class="card-title">Interests</h5>
                <a class="btn btn-primary-soft btn-sm" href="#!"> <i class="fa-solid fa-plus"></i> </a>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body position-relative pt-0">
                <?php foreach ($groups as $item) : ?>
                    <!-- Experience item START -->
                    <div class="d-flex">
                        <!-- Avatar -->
                        <div class="avatar me-3">
                            <a href="<?= Url::to(['group/single' , 'slug' => $item->slug]) ?>">
                                <?= Html::img($item->image, ['class' => 'avatar-img rounded-circle']) ?>
                            </a>
                        </div>
                        <!-- Info -->
                        <div>
                            <h6 class="card-title mb-0"><a href="<?= Url::to(['group/single' , 'slug' => $item->slug]) ?>"> <?= $item->title ?> </a></h6>
                            <p class="small"><?= $item->short ?></p>
                        </div>
                    </div>
                    <!-- Experience item END -->
                <?php endforeach; ?>

            </div>
            <!-- Card body END -->
        </div>
    </div>
    <!-- Card END -->
<?php endif; ?>

<?php if (!empty($friends)) : ?>
    <!-- Card START -->
    <div class="col-md-6 col-lg-12">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                <h5 class="card-title">Friends <span
                            class="badge bg-danger bg-opacity-10 text-danger"><?php echo count($page->friends) ?></span>
                </h5>
                <a class="btn btn-primary-soft btn-sm" href="<?= Url::to(['profile/connections', 'user' => $user]) ?>">
                    See all friends</a>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->

            <div class="card-body position-relative pt-0">
                <div class="row g-3">
                    <?php foreach ($friends as $friend) : ?>
                        <div class="col-6">
                            <!-- Friends item START -->
                            <div class="card shadow-none text-center h-100">
                                <!-- Card body -->
                                <div class="card-body p-2 pb-0">
                                    <div class="avatar avatar-story avatar-xl">
                                        <a href="<?= Url::to(['profile/friend', 'id' => $friend->friend->id]) ?>">
                                            <?= Html::img($friend->friend->image, ['alt' => $friend->friend->display_name, 'class' => 'avatar-img rounded-circle']) ?>
                                        </a>
                                    </div>
                                    <h6 class="card-title mb-1 mt-3"><a
                                                href="<?= Url::to(['profile/friend', 'id' => $friend->friend->id]) ?>"> <?= $friend->friend->page_name ?> </a>
                                    </h6>
                                    <p class="mb-0 small lh-sm"><?= $friend->friend->category->title ?></p>
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer p-2 border-0">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Send message"><i
                                                class="bi bi-chat-left-text"></i></button>
                                    <button class="btn btn-sm btn-danger delete-friend"
                                            data-value="<?= $friend->friend->id ?>" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Remove friend"><i class="bi bi-person-x"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Friends item END -->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Card body END -->
        </div>
    </div>
    <!-- Card END -->
<?php endif; ?>