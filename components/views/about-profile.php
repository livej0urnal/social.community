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

    <!-- Card START -->
    <div class="col-md-6 col-lg-12">
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
                        <a href="#!"> <img class="avatar-img rounded-circle" src="/images/logo/08.svg" alt=""> </a>
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
                        <a href="#!"> <img class="avatar-img rounded-circle" src="/images/logo/09.svg" alt=""> </a>
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
                        <a href="#!"> <img class="avatar-img rounded-circle" src="/images/logo/10.svg" alt=""> </a>
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
    <!-- Card END -->

    <!-- Card START -->
    <div class="col-md-6 col-lg-12">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header d-sm-flex justify-content-between border-0">
                <h5 class="card-title">Photos</h5>
                <a class="btn btn-primary-soft btn-sm" href="#!"> See all photo</a>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body position-relative pt-0">
                <div class="row g-2">
                    <!-- Photos item -->
                    <div class="col-6">
                        <a href="/images/albums/01.jpg" data-gallery="image-popup" data-glightbox="">
                            <img class="rounded img-fluid" src="/images/albums/01.jpg" alt="">
                        </a>
                    </div>
                    <!-- Photos item -->
                    <div class="col-6">
                        <a href="/images/albums/02.jpg" data-gallery="image-popup" data-glightbox="">
                            <img class="rounded img-fluid" src="/images/albums/02.jpg" alt="">
                        </a>
                    </div>
                    <!-- Photos item -->
                    <div class="col-4">
                        <a href="/images/albums/03.jpg" data-gallery="image-popup" data-glightbox="">
                            <img class="rounded img-fluid" src="/images/albums/03.jpg" alt="">
                        </a>
                    </div>
                    <!-- Photos item -->
                    <div class="col-4">
                        <a href="/images/albums/04.jpg" data-gallery="image-popup" data-glightbox="">
                            <img class="rounded img-fluid" src="/images/albums/04.jpg" alt="">
                        </a>
                    </div>
                    <!-- Photos item -->
                    <div class="col-4">
                        <a href="/images/albums/05.jpg" data-gallery="image-popup" data-glightbox="">
                            <img class="rounded img-fluid" src="/images/albums/05.jpg" alt="">
                        </a>
                        <!-- glightbox Albums left bar END  -->
                    </div>
                </div>
            </div>
            <!-- Card body END -->
        </div>
    </div>
    <!-- Card END -->

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
                                        <a href="<?= Url::to(['profile/friend' , 'id' => $friend->page->id]) ?>">
                                            <img class="avatar-img rounded-circle" src="/images/avatar/02.jpg"
                                                          alt="">
                                        </a>
                                    </div>
                                    <h6 class="card-title mb-1 mt-3"><a href="#!"> Amanda Reed </a></h6>
                                    <p class="mb-0 small lh-sm">16 mutual connections</p>
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer p-2 border-0">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Send message"><i
                                                class="bi bi-chat-left-text"></i></button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
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