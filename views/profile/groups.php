<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
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

            <!-- Navbar START-->
            <nav class="navbar navbar-expand-lg mx-0">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
                    <!-- Offcanvas header -->
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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
                                        <a class="nav-link" href="blog.html"> <img class="me-2 h-20px fa-fw"
                                                                                   src="/images/icon/earth-outline-filled.svg"
                                                                                   alt=""><span>Latest News </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="events.html"> <img class="me-2 h-20px fa-fw"
                                                                                     src="/images/icon/calendar-outline-filled.svg"
                                                                                     alt=""><span>Events </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= Url::to(['profile/groups']) ?>"> <img class="me-2 h-20px fa-fw"
                                                                                     src="/images/icon/chat-outline-filled.svg"
                                                                                     alt=""><span>Groups </span></a>
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
        </div>
        <!-- Sidenav END -->

        <!-- Main content START -->
        <div class="col-md-8 col-lg-6 vstack gap-4">
            <!-- Card START -->
            <div class="card">
                <!-- Card header START -->
                <div class="card-header border-0 pb-0">
                    <div class="row g-2">
                        <div class="col-lg-2">
                            <!-- Card title -->
                            <h1 class="h4 card-title mb-lg-0">Group</h1>
                        </div>
                        <div class="col-sm-6 col-lg-3 ms-lg-auto">
                            <!-- Select Groups -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Button modal -->
                            <a class="btn btn-primary-soft ms-auto w-100" href="#" data-bs-toggle="modal" data-bs-target="#modalCreateGroup"> <i class="fa-solid fa-plus pe-1"></i> Create group</a>
                        </div>
                    </div>
                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                    <div class="tab-content mb-0 pb-0">
                        <?php $groups = $page->groups; ?>
                        <?php if(!empty($groups)) : ?>
                        <!-- Friends groups tab START -->
                        <div class="tab-pane fade show active" id="tab-1">
                            <div class="row g-4">
                                <?php foreach ($groups as $group) : ?>
                                <div class="col-sm-6 col-lg-4">
                                    <!-- Card START -->
                                    <div class="card">
                                        <div class="h-80px rounded-top" style="background-image:url(<?= $group->group->background ?>); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        <!-- Card body START -->
                                        <div class="card-body text-center pt-0">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="<?= Url::to(['group/single', 'slug' => $group->group->slug]) ?>">
                                                    <?= Html::img($group->group->image, ['class' => 'avatar-img rounded-circle border border-white border-3 bg-white']) ?>
                                                </a>
                                            </div>
                                            <!-- Info -->
                                            <h5 class="mb-0"> <a href="<?= Url::to(['group/single', 'slug' => $group->group->slug]) ?>"><?= $group->group->title ?></a></h5>
                                            <?php if($group->group->is_private != 1): ?>
                                                <small> <i class="bi bi-globe pe-1"></i> Public Group</small>
                                            <?php else : ?>
                                                <small> <i class="bi bi-lock pe-1"></i> Private Group</small>
                                            <?php endif; ?>


                                            <!-- Group stat START -->
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0"><?php echo count($group->group->users)?></h6>
                                                    <small>Members</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0"><?php echo count($group->group->posts); ?></h6>
                                                    <small>Posts</small>
                                                </div>
                                            </div>
                                            <!-- Group stat END -->
                                        </div>
                                        <!-- Card body END -->
                                        <!-- Card Footer START -->
                                        <div class="card-footer text-center">
                                            <a class="btn btn-danger-soft btn-sm" href="#!"> Leave group </a>
                                        </div>
                                        <!-- Card Footer END -->
                                    </div>
                                    <!-- Card END -->
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- Friends' groups tab END -->
                        <?php endif; ?>

                    </div>
                </div>
                <!-- Card body END -->
            </div>
            <!-- Card END -->
        </div>
        <!-- Right sidebar END -->

    </div> <!-- Row END -->
</div>
