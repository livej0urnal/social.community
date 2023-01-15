<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
?>
<div class="row g-4">
    <?php if(!empty($posts)) : ?>
    <!-- Card News START -->
    <div class="col-sm-6 col-lg-12">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header pb-0 border-0">
                <h5 class="card-title mb-0">Recent post</h5>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                <?php foreach ($posts as $post) : ?>
                <!-- News item -->
                <div class="mb-3">
                    <h6 class="mb-0">
                        <a href="<?= Url::to(['news/single', 'slug' => $post->slug]) ?>">
                            <?= $post->title ?>
                        </a>
                    </h6>
                    <small><?= $post->public_date ?></small>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- Card body END -->
        </div>
    </div>
    <!-- Card News END -->
    <?php endif; ?>

    <?php if(!empty($categories)) : ?>
    <!-- Card News START -->
    <div class="col-sm-6 col-lg-12">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header pb-0 border-0">
                <h5 class="card-title mb-0">Tags</h5>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                <!-- Tag list START -->
                <ul class="list-inline mb-0 d-flex flex-wrap gap-2">
                    <?php foreach ($categories as $category) : ?>
                        <li class="list-inline-item m-0">
                            <a class="btn btn-outline-light btn-sm" href="<?= Url::to(['news/category', 'id' => $category->id]) ?>"><?= $category->title ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <!-- Tag list END -->
                <!-- Card body END -->
            </div>
        </div>
        <!-- Card News END -->
    </div>
    <?php endif; ?>

    <?php if(!empty($page->feeds)) : ?>
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
                    <?php foreach ($page->feeds as $feed) : ?>
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
</div>
<!-- Right sidebar END -->
