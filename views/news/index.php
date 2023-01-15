<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<div class="container">
    <div class="row g-4">
        <!-- Main content START -->
        <div class="col-lg-8">
            <div class="bg-mode p-4">
                <h1 class="h4 mb-4">Latest blogs</h1>
                <!-- Blog item START -->
                <div class="card bg-transparent border-0">
                    <div class="row g-3">
                        <div class="col-4">
                            <!-- Blog image -->
                            <img class="rounded" src="/images/post/4by3/03.jpg" alt="">
                        </div>
                        <div class="col-8">
                            <!-- Blog caption -->
                            <a href="#" class="badge bg-danger bg-opacity-10 text-danger mb-2 fw-bold">Lifestyle</a>
                            <h5><a href="blog-details.html" class="btn-link stretched-link text-reset fw-bold">Social
                                    guides the way in 2022 app performance report</a></h5>
                            <div class="d-none d-sm-inline-block">
                                <p class="mb-2">Speedily say has suitable disposal add boy. On forth doubt miles of
                                    child. Exercise joy man children rejoiced.</p>
                                <!-- BLog date -->
                                <a class="small text-secondary" href="#!"> <i class="bi bi-calendar-date pe-1"></i> Jan
                                    22, 2022</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog item END -->
                <hr class="my-4">
                <!-- Blog item START -->
                <div class="card bg-transparent border-0">
                    <div class="row g-3">
                        <div class="col-4">
                            <!-- Blog image -->
                            <img class="rounded" src="/images/post/4by3/04.jpg" alt="">
                        </div>
                        <div class="col-8">
                            <!-- Blog caption -->
                            <a href="#" class="badge bg-info bg-opacity-10 text-info mb-2 fw-bold">Sports</a>
                            <h5><a href="blog-details.html" class="btn-link stretched-link text-reset fw-bold">Upcoming
                                    live video feed may not work how you expect</a></h5>
                            <div class="d-none d-sm-inline-block">
                                <p class="mb-2">Under folly balls, death own point now men. Match way these she avoids
                                    seeing death.</p>
                                <!-- BLog date -->
                                <a class="small text-secondary" href="#!"> <i class="bi bi-calendar-date pe-1"></i> Mar
                                    07, 2022</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog item END -->
                <hr class="my-4">
                <!-- Blog item START -->
                <div class="card bg-transparent border-0">
                    <div class="row g-3">
                        <div class="col-4">
                            <!-- Blog image -->
                            <img class="rounded" src="/images/post/4by3/05.jpg" alt="">
                        </div>
                        <div class="col-8">
                            <!-- Blog caption -->
                            <a href="#" class="badge bg-success bg-opacity-10 text-success mb-2 fw-bold">Business</a>
                            <h5><a href="blog-details.html" class="btn-link stretched-link text-reset fw-bold">Google
                                    shares top search trends of 2022</a></h5>
                            <div class="d-none d-sm-inline-block">
                                <p class="mb-2">I think on style child of. Servants moreover in sensible it ye possible
                                    six say his. </p>
                                <!-- BLog date -->
                                <a class="small text-secondary" href="#!"> <i class="bi bi-calendar-date pe-1"></i> Jun
                                    17, 2022</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog item END -->
                <hr class="my-4">
                <!-- Blog item START -->
                <div class="card bg-transparent border-0">
                    <div class="row g-3">
                        <div class="col-4">
                            <!-- Blog image -->
                            <img class="rounded" src="/images/post/4by3/06.jpg" alt="">
                        </div>
                        <div class="col-8">
                            <!-- Blog caption -->
                            <a href="#" class="badge bg-warning bg-opacity-10 text-warning mb-2 fw-bold">Technology</a>
                            <h5><a href="blog-details.html" class="btn-link stretched-link text-reset fw-bold">Counts
                                    reels replies, delivering another way to tap into the video</a></h5>
                            <div class="d-none d-sm-inline-block">
                                <p class="mb-2">Placing forming nay looking old married few has. Margaret disposed of
                                    add screened rendered. </p>
                                <!-- BLog date -->
                                <a class="small text-secondary" href="#!"> <i class="bi bi-calendar-date pe-1"></i> Nov
                                    11, 2022</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog item END -->
                <!-- Pagination -->
                <div class="mt-4">
                    <nav aria-label="navigation">
                        <ul class="pagination pagination-light d-inline-block d-md-flex justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Prev</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">15</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Main content END -->

        <!-- Right sidebar START -->
        <div class="col-lg-4">
            <?= \app\components\SidebarBlogWidget::widget() ?>
        </div> <!-- Row END -->
    </div>
</div>