<?php
?>

<li class="nav-item ms-2">
    <a class="nav-link icon-md btn btn-light p-0" href="<?= \yii\helpers\Url::to(['message/single', 'user' => $user]) ?>">
        <i class="bi bi-chat-left-text-fill fs-6"> </i>
    </a>
</li>
<li class="nav-item ms-2">
    <a class="nav-link icon-md btn btn-light p-0" href="<?= \yii\helpers\Url::to(['page/edit' , 'id' => $page->id]) ?>">
        <i class="bi bi-gear-fill fs-6"> </i>
    </a>
</li>
<li class="nav-item dropdown ms-2">
    <a class="nav-link icon-md btn btn-light p-0" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
        <span class="badge-notif animation-blink"></span>
        <?php if(!empty($page->feeds)) : ?>
        <i class="bi bi-bell-fill fs-6"> </i>
        <?php endif; ?>
    </a>
    <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0" aria-labelledby="notifDropdown">
        <div class="card">
            <?php if(!empty($page->feeds)) : ?>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2"><?php echo count($page->feeds); ?> new</span></h6>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush list-unstyled p-2">
                    <?php foreach ($page->feeds as $feed) : ?>
                    <!-- Notif item -->
                    <li>
                        <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                            <div class="avatar text-center d-none d-sm-inline-block">
                                <?= \yii\helpers\Html::img($feed->feed->image, ['class' => 'avatar-img rounded-circle']) ?>
                            </div>
                            <div class="ms-sm-3">
                                <div class=" d-flex">
                                    <p class="small mb-2"><b><?= $feed->feed->page_name ?></b> sent you a friend request.</p>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-sm py-1 btn-primary me-2 apply-friend" data-value="<?= $feed->feed_id ?>">Accept </button>
                                    <button class="btn btn-sm py-1 btn-danger-soft">Delete </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Notif item -->
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card-footer text-center">
                <a href="<?= \yii\helpers\Url::to(['activity/index']) ?>" class="btn btn-sm btn-primary-soft">See all incoming activity</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</li>
<!-- Notification dropdown END -->
