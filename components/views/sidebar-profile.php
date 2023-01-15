<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>

<!-- Navbar START-->
<nav class="navbar navbar-expand-lg mx-0">
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
        <!-- Offcanvas header -->
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>

        <!-- Offcanvas body -->
        <div class="offcanvas-body d-block px-2 px-lg-0">
            <!-- Card START -->
            <div class="card overflow-hidden">
                <!-- Cover image -->
                <div class="h-50px"
                     style="background-image:url(/images/bg/01.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                <!-- Card body START -->
                <div class="card-body pt-0">
                    <div class="text-center">
                        <!-- Avatar -->
                        <div class="avatar avatar-lg mt-n5 mb-3">
                            <a href="<?= Url::to(['page/profile', 'id' => $page->id]) ?>">
                                <?php if ($page->image) : ?>
                                    <?= Html::img($page->image, ['alt' => $page->display_name, 'class' => 'avatar-img rounded border border-white border-3']) ?>
                                <?php else: ?>
                                    <img class="avatar-img rounded border border-white border-3"
                                         src="/images/avatar/avatar.png" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- Info -->
                        <h5 class="mb-0"><a
                                    href="<?= Url::to(['page/profile', 'id' => $page->id]) ?>"> <?= $page->page_name ?> </a>
                        </h5>
                        <small><?= $page->category->title ?></small>
                        <p class="mt-3"><?= $page->about_page ?></p>

                        <!-- User stat START -->
                        <div class="hstack gap-2 gap-xl-3 justify-content-center">
                            <!-- User stat item -->
                            <div>
                                <h6 class="mb-0"><?php echo count($page->posts); ?></h6>
                                <small>Post</small>
                            </div>
                            <!-- Divider -->
                            <div class="vr"></div>
                            <!-- User stat item -->
                            <div>
                                <h6 class="mb-0"><?php echo count($page->comments) ?></h6>
                                <small>Comments</small>
                            </div>
                            <!-- Divider -->
                            <div class="vr"></div>
                            <!-- User stat item -->
                            <div>
                                <h6 class="mb-0"><?php echo count($page->friends); ?></h6>
                                <small>Friends</small>
                            </div>
                        </div>
                        <!-- User stat END -->
                    </div>

                    <!-- Divider -->
                    <hr>

                    <!-- Side Nav START -->
                    <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['page/profile', 'id' => $page->id]) ?>"> <img
                                        class="me-2 h-20px fa-fw" src="/images/icon/home-outline-filled.svg"
                                        alt=""><span>Feed </span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['profile/connections', 'user' => $user]) ?>">
                                <img class="me-2 h-20px fa-fw" src="/images/icon/person-outline-filled.svg"
                                     alt=""><span>Connections </span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['profile/groups']) ?>"> <img
                                        class="me-2 h-20px fa-fw"
                                        src="/images/icon/chat-outline-filled.svg"
                                        alt=""><span>Groups </span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['news/index']) ?>"> <img class="me-2 h-20px fa-fw" src="/images/icon/earth-outline-filled.svg" alt=""><span>Latest News </span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['page/edit', 'id' => $page->id]) ?>"> <img
                                        class="me-2 h-20px fa-fw" src="/images/icon/cog-outline-filled.svg"
                                        alt=""><span>Settings </span></a>
                        </li>
                    </ul>
                    <!-- Side Nav END -->
                </div>
                <!-- Card body END -->
                <!-- Card footer -->
                <div class="card-footer text-center py-2">
                    <a class="btn btn-link btn-sm" href="<?= Url::to(['page/profile', 'id' => $page->id]) ?>">View
                        Profile </a>
                </div>
            </div>
            <!-- Card END -->
        </div>
    </div>
</nav>
<!-- Navbar END-->
