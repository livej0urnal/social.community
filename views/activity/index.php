<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>

<div class="container">
    <div class="row g-4">
        <!-- Main content START -->
        <div class="col-lg-8 mx-auto">
            <!-- Card START -->
            <div class="card">
                <div class="card-header py-3 border-0 d-flex align-items-center justify-content-between">
                    <h1 class="h5 mb-0">Notifications <?= $page->page_name ?></h1>
                </div>
                <div class="card-body p-2">
                    <?php if(!empty($page->feeds)) : ?>
                    <ul class="list-unstyled">
                        <?php foreach ($page->feeds as $feed) : ?>
                        <!-- Notif item -->
                        <li>
                            <div class="rounded d-sm-flex border-0 mb-1 p-3 position-relative">
                                <!-- Avatar -->
                                <div class="avatar text-center">
                                    <?= Html::img($feed->feed->image, ['class' => 'avatar-img rounded-circle']) ?>
                                </div>
                                <!-- Info -->
                                <div class="mx-sm-3 my-2 my-sm-0">
                                    <p class="small mb-2"><b><?= $feed->feed->page_name ?></b> sent you a friend request.</p>
                                    <!-- Button -->
                                    <div class="d-flex">
                                        <button class="btn btn-sm py-1 btn-primary me-2 apply-friend" data-value="<?= $feed->feed_id ?>">Accept</button>
                                        <button class="btn btn-sm py-1 btn-danger-soft">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Notif item -->
                        <?php endforeach; ?>
                    </ul>
                    <?php else :?>
                        <p>No activity</p>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Card END -->
        </div>
    </div> <!-- Row END -->
</div>
