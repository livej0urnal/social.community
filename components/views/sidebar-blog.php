<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
?>
<div class="row g-4">
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
                <!-- News item -->
                <div class="mb-3">
                    <h6 class="mb-0"><a href="blog-details.html">Ten questions you should answer
                            truthfully</a></h6>
                    <small>2hr</small>
                </div>
                <!-- News item -->
                <div class="mb-3">
                    <h6 class="mb-0"><a href="blog-details.html">Five unbelievable facts about money</a>
                    </h6>
                    <small>3hr</small>
                </div>
                <!-- News item -->
                <div class="mb-3">
                    <h6 class="mb-0"><a href="blog-details.html">Best Pinterest Boards for learning about
                            business</a></h6>
                    <small>4hr</small>
                </div>
                <!-- News item -->
                <div class="mb-3">
                    <h6 class="mb-0"><a href="blog-details.html">Skills that you can learn from business</a>
                    </h6>
                    <small>6hr</small>
                </div>
                <!-- Load more comments -->
                <a href="#!" role="button"
                   class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center"
                   data-bs-toggle="button" aria-pressed="true">
                    <div class="spinner-dots me-2">
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                    </div>
                    View all latest news
                </a>
            </div>
            <!-- Card body END -->
        </div>
    </div>
    <!-- Card News END -->
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
                            <a href="#">
                                <?= Html::img($feed->image, ['class' => 'avatar-img rounded-circle']) ?>
                            </a>
                        </div>
                        <!-- Title -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0" href="#!">Billy Vasquez </a>
                            <p class="mb-0 small text-truncate">News anchor</p>
                        </div>
                        <!-- Button -->
                        <a class="btn btn-primary rounded-circle icon-md ms-auto" href="#"><i
                                class="bi bi-person-check-fill"> </i></a>
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
