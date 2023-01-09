<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
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
            <!-- Advanced filter responsive toggler END -->
            <?php
            //кеш на час
            if ($this->beginCache('SidebarUser', ['duration' => 100])) {
                echo \app\components\SidebarProfileWidget::widget();
                $this->endCache(); }
            ?>
            <!--            --><?//= \app\components\SidebarProfileWidget::widget() ?>
        </div>
        <!-- Sidenav END -->

        <!-- Main content START -->
        <div class="col-md-8 col-lg-9 vstack gap-4">
            <!-- Card START -->
            <div class="card">
                <!-- Card body START -->
                <div class="card-body">
                    <div class="d-md-flex flex-wrap align-items-start text-center text-md-start">
                        <div class="mb-2">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl">
                                <?= Html::img($group->image, ['class' => 'avatar-img border-0']) ?>
                            </div>
                        </div>
                        <div class="ms-md-4 mt-3">
                            <!-- Info -->
                            <h1 class="h5 mb-0"><?= $group->title ?> <i class="bi bi-patch-check-fill text-success small"></i></h1>
                            <ul class="nav nav-divider justify-content-center justify-content-md-start">
                                <?php if($group->is_private != 1): ?>
                                    <li class="nav-item"> Public group </li>
                                <?php else : ?>
                                    <li class="nav-item"> Private group </li>
                                <?php endif; ?>

                                <li class="nav-item"> <?php echo count($group->users) ?> members </li>
                            </ul>
                        </div>
                        <!-- Button -->
                        <div class="d-flex justify-content-center justify-content-md-start align-items-center mt-3 ms-lg-auto">
                            <button class="btn btn-sm btn-primary-soft me-2" type="button"> <i class="bi bi-person-check-fill pe-1"></i> Joined</button>
                            <button class="btn btn-sm btn-success me-2" type="button"> <i class="fa-solid fa-plus pe-1"></i> Invite</button>
                            <?php if($group->admin != $page->id) : ?>
                            <?php else: ?>
                            <div class="dropdown">
                                <!-- Group share action menu -->
                                <button class="icon-sm btn btn-dark-soft" type="button" id="groupAction" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <!-- Group share action dropdown menu -->
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="groupAction" style="">
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Share profile in a message</a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-file-earmark-pdf fa-fw pe-2"></i>Save your profile to PDF</a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-lock fa-fw pe-2"></i>Lock profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Profile settings</a></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if(!empty($users) && $group->is_private != 1) : ?>
                    <!-- Join group START -->
                    <ul class="avatar-group list-unstyled justify-content-center justify-content-md-start align-items-center mb-0 mt-3 flex-wrap">
                        <?php foreach ($users as $item) : ?>
                            <li class="avatar avatar-xs">
                                <?= Html::img($item->page->image, ['class' => 'avatar-img rounded-circle']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- Join group END -->
                    <?php endif; ?>
                </div>
            </div>
            <!-- Card END -->

            <div class="tab-content pt-0 pb-0 mb-0">

                <!-- Gruop Feed tab START -->
                <div class="tab-pane fade active show" id="group-tab-1">
                    <div class="row g-4">
                        <div class="col-lg-8 vstack gap-4">

                            <!-- Card feed item START -->
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header border-0 pb-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-story me-2">
                                                <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt=""> </a>
                                            </div>
                                            <!-- Info -->
                                            <div>
                                                <div class="nav nav-divider">
                                                    <h6 class="nav-item card-title mb-0"> <a href="#!"> Lori Ferguson </a></h6>
                                                    <span class="nav-item small"> 2hr</span>
                                                </div>
                                                <p class="mb-0 small">Web Developer at Webestica</p>
                                            </div>
                                        </div>
                                        <!-- Card feed action dropdown START -->
                                        <div class="dropdown">
                                            <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <!-- Card feed action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction1">
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                                            </ul>
                                        </div>
                                        <!-- Card feed action dropdown END -->
                                    </div>
                                </div>
                                <!-- Card header END -->
                                <!-- Card body START -->
                                <div class="card-body">
                                    <p>I'm thrilled to share that I've completed a graduate certificate course in project management with the president's honor roll.</p>
                                    <!-- Card img -->
                                    <img class="card-img" src="assets/images/post/3by2/01.jpg" alt="Post">
                                    <!-- Feed react START -->
                                    <ul class="nav nav-stack py-3 small">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#!"> <i class="bi bi-hand-thumbs-up-fill pe-1"></i>Liked (56)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
                                        </li>
                                        <!-- Card share action START -->
                                        <li class="nav-item dropdown ms-sm-auto">
                                            <a class="nav-link mb-0" href="#" id="cardShareAction8" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                                            </a>
                                            <!-- Card share action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction8">
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                                            </ul>
                                        </li>
                                        <!-- Card share action END -->
                                    </ul>
                                    <!-- Feed react END -->

                                    <!-- Add comment -->
                                    <div class="d-flex mb-3">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-xs me-2">
                                            <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt=""> </a>
                                        </div>
                                        <!-- Comment box  -->
                                        <form class="position-relative w-100">
                                            <textarea class="form-control pe-4 bg-light" rows="1" placeholder="Add a comment..."></textarea>
                                        </form>
                                    </div>
                                    <!-- Comment wrap START -->
                                    <ul class="comment-wrap list-unstyled">
                                        <!-- Comment item START -->
                                        <li class="comment-item">
                                            <div class="d-flex position-relative">
                                                <div class="comment-line-inner"></div>
                                                <!-- Avatar -->
                                                <div class="avatar avatar-xs">
                                                    <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt=""></a>
                                                </div>
                                                <div class="ms-2">
                                                    <!-- Comment by -->
                                                    <div class="bg-light rounded-start-top-0 p-3 rounded">
                                                        <div class="d-flex justify-content-center">
                                                            <div class="me-2">
                                                                <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a></h6>
                                                                <p class="small mb-0">Removed demands expense account in outward tedious do. Particular way thoroughly unaffected projection.</p>
                                                            </div>
                                                            <small>5hr</small>
                                                        </div>
                                                    </div>
                                                    <!-- Comment react -->
                                                    <ul class="nav nav-divider py-2 small">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#!"> Like (3)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#!"> Reply</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#!"> View 5 replies</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Comment item nested START -->
                                            <ul class="comment-item-nested list-unstyled">
                                                <!-- Comment item START -->
                                                <li class="comment-item">
                                                    <div class="comment-line-inner"></div>
                                                    <div class="d-flex">
                                                        <!-- Avatar -->
                                                        <div class="avatar avatar-xs">
                                                            <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt=""></a>
                                                        </div>
                                                        <!-- Comment by -->
                                                        <div class="ms-2">
                                                            <div class="bg-light p-3 rounded">
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="me-2">
                                                                        <h6 class="mb-1"> <a href="#!"> Lori Stevens </a> </h6>
                                                                        <p class="small mb-0">See resolved goodness felicity shy civility domestic had but Drawings offended yet answered Jennings perceive.</p>
                                                                    </div>
                                                                    <small>2hr</small>
                                                                </div>
                                                            </div>
                                                            <!-- Comment react -->
                                                            <ul class="nav nav-divider py-2 small">
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#!"> Like (5)</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#!"> Reply</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- Comment item END -->
                                                <!-- Comment item START -->
                                                <li class="comment-item">
                                                    <div class="comment-line-inner"></div>
                                                    <div class="d-flex">
                                                        <!-- Avatar -->
                                                        <div class="avatar avatar-story avatar-xs">
                                                            <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt=""></a>
                                                        </div>
                                                        <!-- Comment by -->
                                                        <div class="ms-2">
                                                            <div class="bg-light p-3 rounded">
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="me-2">
                                                                        <h6 class="mb-1"> <a href="#!"> Billy Vasquez </a> </h6>
                                                                        <p class="small mb-0">Wishing calling is warrant settled was lucky.</p>
                                                                    </div>
                                                                    <small>15min</small>
                                                                </div>
                                                            </div>
                                                            <!-- Comment react -->
                                                            <ul class="nav nav-divider py-2 small">
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#!"> Like</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#!"> Reply</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- Comment item END -->
                                            </ul>
                                            <!-- Load more replies -->
                                            <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center mb-3 ms-5" data-bs-toggle="button" aria-pressed="true">
                                                <div class="spinner-dots me-2">
                                                    <span class="spinner-dot"></span>
                                                    <span class="spinner-dot"></span>
                                                    <span class="spinner-dot"></span>
                                                </div>
                                                Load more replies
                                            </a>
                                            <!-- Comment item nested END -->
                                        </li>
                                        <!-- Comment item END -->
                                        <!-- Comment item START -->
                                        <li class="comment-item">
                                            <div class="d-flex">
                                                <!-- Avatar -->
                                                <div class="avatar avatar-xs">
                                                    <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt=""></a>
                                                </div>
                                                <!-- Comment by -->
                                                <div class="ms-2">
                                                    <div class="bg-light p-3 rounded">
                                                        <div class="d-flex justify-content-center">
                                                            <div class="me-2">
                                                                <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a> </h6>
                                                                <p class="small mb-0">Removed demands expense account in outward tedious do. Particular way thoroughly unaffected projection.</p>
                                                            </div>
                                                            <small>4min</small>
                                                        </div>
                                                    </div>
                                                    <!-- Comment react -->
                                                    <ul class="nav nav-divider pt-2 small">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#!"> Like (1)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#!"> Reply</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#!"> View 6 replies</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Comment item END -->
                                    </ul>
                                    <!-- Comment wrap END -->
                                </div>
                                <!-- Card body END -->
                                <!-- Card footer START -->
                                <div class="card-footer border-0 pt-0">
                                    <!-- Load more comments -->
                                    <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center" data-bs-toggle="button" aria-pressed="true">
                                        <div class="spinner-dots me-2">
                                            <span class="spinner-dot"></span>
                                            <span class="spinner-dot"></span>
                                            <span class="spinner-dot"></span>
                                        </div>
                                        Load more comments
                                    </a>
                                </div>
                                <!-- Card footer END -->
                            </div>
                            <!-- Card feed item END -->
                        </div>

                        <div class="col-lg-4">
                            <!-- About START -->
                            <div class="card">
                                <!-- Title -->
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title">About</h5>
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <p><?= $group->short ?></p>
                                    <!-- info -->
                                    <ul class="list-unstyled mt-3 mb-0">
                                        <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> People: <strong> <?php echo count($group->users); ?> Members </strong> </li>
                                        <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status:
                                            <?php if($group->is_private != 1): ?>
                                                <strong> Public </strong>
                                            <?php else : ?>
                                                <strong> Private </strong>
                                            <?php endif; ?>

                                        </li>
                                        <li class="mb-2"> <i class="bi bi-globe2 fa-fw pe-1"></i> <strong>www.webestica.com </strong> </li>
                                    </ul>
                                </div>
                                <!-- Card body END -->
                            </div>
                            <!-- About END -->
                        </div>
                    </div>
                </div>
                <!-- Gruop Feed tab END -->
            </div>

        </div>
    </div> <!-- Row END -->
</div>
