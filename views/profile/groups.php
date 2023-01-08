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
                            <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select js-choice choice-select-text-none choices__input" data-search-enabled="false" hidden="" tabindex="-1" data-choice="active"><option value="AB">Alphabetical</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="AB" data-custom-properties="null" aria-selected="true">Alphabetical</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--hvfy-item-choice-1" class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="AB" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Alphabetical</div><div id="choices--hvfy-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="NG" data-select-text="Press to select" data-choice-selectable="">Newest group</div><div id="choices--hvfy-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="RA" data-select-text="Press to select" data-choice-selectable="">Recently active</div><div id="choices--hvfy-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="SG" data-select-text="Press to select" data-choice-selectable="">Suggested</div></div></div></div>
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
                    <!-- Tab nav line -->
                    <ul class="nav nav-tabs nav-bottom-line justify-content-center justify-content-md-start">
                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#tab-1"> Friends' groups </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-2"> Suggested for you </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-3"> Popular near you </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-4"> More suggestions </a> </li>
                    </ul>
                    <div class="tab-content mb-0 pb-0">

                        <!-- Friends groups tab START -->
                        <div class="tab-pane fade show active" id="tab-1">
                            <div class="row g-4">
                                <div class="col-sm-6 col-lg-4">
                                    <!-- Card START -->
                                    <div class="card">
                                        <div class="h-80px rounded-top" style="background-image:url(assets/images/bg/01.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        <!-- Card body START -->
                                        <div class="card-body text-center pt-0">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="assets/images/logo/08.svg" alt=""></a>
                                            </div>
                                            <!-- Info -->
                                            <h5 class="mb-0"> <a href="group-details.html">All in the Mind</a> </h5>
                                            <small> <i class="bi bi-lock pe-1"></i> Private Group</small>
                                            <!-- Group stat START -->
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">32k</h6>
                                                    <small>Members</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">20</h6>
                                                    <small>Post per day</small>
                                                </div>
                                            </div>
                                            <!-- Group stat END -->
                                            <!-- Avatar group START -->
                                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+22</span></div>
                                                </li>
                                            </ul>
                                            <!-- Avatar group END -->
                                        </div>
                                        <!-- Card body END -->
                                        <!-- Card Footer START -->
                                        <div class="card-footer text-center">
                                            <a class="btn btn-success-soft btn-sm" href="#!"> Join group </a>
                                        </div>
                                        <!-- Card Footer END -->
                                    </div>
                                    <!-- Card END -->
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <!-- Card START -->
                                    <div class="card">
                                        <div class="h-80px rounded-top" style="background-image:url(assets/images/bg/02.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        <!-- Card body START -->
                                        <div class="card-body text-center pt-0">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="assets/images/logo/02.svg" alt=""></a>
                                            </div>
                                            <!-- Info -->
                                            <h5 class="mb-0"><a href="group-details.html">Beauty queens</a></h5>
                                            <small> <i class="bi bi-globe pe-1"></i> Public Group</small>
                                            <!-- Group stat START -->
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">23k</h6>
                                                    <small>Members</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">12</h6>
                                                    <small>Post per day</small>
                                                </div>
                                            </div>
                                            <!-- Group stat END -->
                                            <!-- Avatar group START -->
                                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+13</span></div>
                                                </li>
                                            </ul>
                                            <!-- Avatar group END -->
                                        </div>
                                        <!-- Card body END -->
                                        <!-- Card Footer START -->
                                        <div class="card-footer text-center">
                                            <a class="btn btn-success-soft btn-sm" href="#!"> Join group </a>
                                        </div>
                                        <!-- Card Footer END -->
                                    </div>
                                    <!-- Card END -->
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <!-- Card START -->
                                    <div class="card">
                                        <div class="h-80px rounded-top" style="background-image:url(assets/images/bg/03.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        <!-- Card body START -->
                                        <div class="card-body text-center pt-0">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="assets/images/logo/09.svg" alt=""></a>
                                            </div>
                                            <!-- Info -->
                                            <h5 class="mb-0"> <a href="group-details.html">Eternal triangle</a></h5>
                                            <small> <i class="bi bi-globe pe-1"></i> Public Group</small>
                                            <!-- Group stat START -->
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">45k</h6>
                                                    <small>Members</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">16</h6>
                                                    <small>Post per day</small>
                                                </div>
                                            </div>
                                            <!-- Group stat END -->
                                            <!-- Avatar group START -->
                                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+12</span></div>
                                                </li>
                                            </ul>
                                            <!-- Avatar group END -->
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
                                <div class="col-sm-6 col-lg-4">
                                    <!-- Card START -->
                                    <div class="card">
                                        <div class="h-80px rounded-top" style="background-image:url(assets/images/bg/04.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        <!-- Card body START -->
                                        <div class="card-body text-center pt-0">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="assets/images/logo/10.svg" alt=""></a>
                                            </div>
                                            <!-- Info -->
                                            <h5 class="mb-0"> <a href="group-details.html">Mountain movers</a></h5>
                                            <small> <i class="bi bi-lock pe-1"></i> Private Group</small>
                                            <!-- Group stat START -->
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">32k</h6>
                                                    <small>Members</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">05</h6>
                                                    <small>Post per day</small>
                                                </div>
                                            </div>
                                            <!-- Group stat END -->
                                            <!-- Avatar group START -->
                                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/14.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/13.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+08</span></div>
                                                </li>
                                            </ul>
                                            <!-- Avatar group END -->
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
                                <div class="col-sm-6 col-lg-4">
                                    <!-- Card START -->
                                    <div class="card">
                                        <div class="h-80px rounded-top" style="background-image:url(assets/images/bg/05.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        <!-- Card body START -->
                                        <div class="card-body text-center pt-0">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="assets/images/logo/12.svg" alt=""></a>
                                            </div>
                                            <!-- Info -->
                                            <h5 class="mb-0"> <a href="group-details.html">Hard workers</a></h5>
                                            <small> <i class="bi bi-lock pe-1"></i> Private Group</small>
                                            <!-- Group stat START -->
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">12k</h6>
                                                    <small>Members</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">05</h6>
                                                    <small>Post per day</small>
                                                </div>
                                            </div>
                                            <!-- Group stat END -->
                                            <!-- Avatar group START -->
                                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+23</span></div>
                                                </li>
                                            </ul>
                                            <!-- Avatar group END -->
                                        </div>
                                        <!-- Card body END -->
                                        <!-- Card Footer START -->
                                        <div class="card-footer text-center">
                                            <a class="btn btn-success-soft btn-sm" href="#!"> Join group </a>
                                        </div>
                                        <!-- Card Footer END -->
                                    </div>
                                    <!-- Card END -->
                                </div>
                            </div>
                        </div>
                        <!-- Friends' groups tab END -->

                        <!-- Suggested for you START -->
                        <div class="tab-pane fade" id="tab-2">
                            <div class="row g-4">
                                <div class="col-sm-6 col-lg-4">
                                    <!-- Card START -->
                                    <div class="card">
                                        <div class="h-80px rounded-top" style="background-image:url(assets/images/bg/01.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        <!-- Card body START -->
                                        <div class="card-body text-center pt-0">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="assets/images/logo/01.svg" alt=""></a>
                                            </div>
                                            <!-- Info -->
                                            <h5 class="mb-0"><a href="group-details.html">Real humans</a></h5>
                                            <small> <i class="bi bi-globe pe-1"></i> Public Group</small>
                                            <!-- Group stat START -->
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">23k</h6>
                                                    <small>Members</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">12</h6>
                                                    <small>Post per day</small>
                                                </div>
                                            </div>
                                            <!-- Group stat END -->
                                            <!-- Avatar group START -->
                                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+12</span></div>
                                                </li>
                                            </ul>
                                            <!-- Avatar group END -->
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
                                <div class="col-sm-6 col-lg-4">
                                    <!-- Card START -->
                                    <div class="card">
                                        <div class="h-80px rounded-top" style="background-image:url(assets/images/bg/02.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        <!-- Card body START -->
                                        <div class="card-body text-center pt-0">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="assets/images/logo/03.svg" alt=""></a>
                                            </div>
                                            <!-- Info -->
                                            <h5 class="mb-0"><a href="group-details.html">Strong signals</a></h5>
                                            <small> <i class="bi bi-lock pe-1"></i> Private Group</small>
                                            <!-- Group stat START -->
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">45k</h6>
                                                    <small>Members</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">16</h6>
                                                    <small>Post per day</small>
                                                </div>
                                            </div>
                                            <!-- Group stat END -->
                                            <!-- Avatar group START -->
                                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+05</span></div>
                                                </li>
                                            </ul>
                                            <!-- Avatar group END -->
                                        </div>
                                        <!-- Card body END -->
                                        <!-- Card Footer START -->
                                        <div class="card-footer text-center">
                                            <a class="btn btn-success-soft btn-sm" href="#!"> Join group </a>
                                        </div>
                                        <!-- Card Footer END -->
                                    </div>
                                    <!-- Card END -->
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <!-- Card START -->
                                    <div class="card">
                                        <div class="h-80px rounded-top" style="background-image:url(assets/images/bg/03.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                                        <!-- Card body START -->
                                        <div class="card-body text-center pt-0">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg mt-n5 mb-3">
                                                <a href="group-details.html"><img class="avatar-img rounded-circle border border-white border-3 bg-white" src="assets/images/logo/05.svg" alt=""></a>
                                            </div>
                                            <!-- Info -->
                                            <h5 class="mb-0"><a href="group-details.html">Team yes, we can</a></h5>
                                            <small> <i class="bi bi-lock pe-1"></i> Private Group</small>
                                            <!-- Group stat START -->
                                            <div class="hstack gap-2 gap-xl-3 justify-content-center mt-3">
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">32k</h6>
                                                    <small>Members</small>
                                                </div>
                                                <!-- Divider -->
                                                <div class="vr"></div>
                                                <!-- Group stat item -->
                                                <div>
                                                    <h6 class="mb-0">05</h6>
                                                    <small>Post per day</small>
                                                </div>
                                            </div>
                                            <!-- Group stat END -->
                                            <!-- Avatar group START -->
                                            <ul class="avatar-group list-unstyled align-items-center justify-content-center mb-0 mt-3">
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/14.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/13.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="avatar">
                                                </li>
                                                <li class="avatar avatar-xs">
                                                    <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+08</span></div>
                                                </li>
                                            </ul>
                                            <!-- Avatar group END -->
                                        </div>
                                        <!-- Card body END -->
                                        <!-- Card Footer START -->
                                        <div class="card-footer text-center">
                                            <a class="btn btn-success-soft btn-sm" href="#!"> Join group </a>
                                        </div>
                                        <!-- Card Footer END -->
                                    </div>
                                    <!-- Card END -->
                                </div>
                            </div>
                        </div>
                        <!-- Suggested for you END -->

                        <!-- Popular near you START -->
                        <div class="tab-pane fade" id="tab-3">
                            <!-- Add group -->
                            <div class="my-sm-5 py-sm-5 text-center">
                                <i class="display-1 text-muted bi bi-people"> </i>
                                <h4 class="mt-2 mb-3 text-body">No group founds</h4>
                                <button class="btn btn-primary-soft btn-sm" data-bs-toggle="modal" data-bs-target="#modalCreateGroup"> Click here to add </button>
                            </div>
                        </div>
                        <!-- Popular near you END -->

                        <!-- More suggestions START -->
                        <div class="tab-pane fade" id="tab-4">
                            <!-- Add group -->
                            <div class="my-sm-5 py-sm-5 text-center">
                                <i class="display-1 text-muted bi bi-people"> </i>
                                <h4 class="mt-2 mb-3 text-body">No group founds</h4>
                                <button class="btn btn-primary-soft btn-sm" data-bs-toggle="modal" data-bs-target="#modalCreateGroup"> Click here to add </button>
                            </div>
                        </div>
                        <!-- More suggestions END -->

                    </div>
                </div>
                <!-- Card body END -->
            </div>
            <!-- Card END -->
        </div>
        <!-- Right sidebar END -->

    </div> <!-- Row END -->
</div>
