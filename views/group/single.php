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
                    <!-- Join group START -->
                    <ul class="avatar-group list-unstyled justify-content-center justify-content-md-start align-items-center mb-0 mt-3 flex-wrap">
                        <li class="avatar avatar-xs">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
                        </li>
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
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                        </li>
                        <li class="avatar avatar-xs">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
                        </li>
                        <li class="avatar avatar-xs">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="avatar">
                        </li>
                        <li class="avatar avatar-xs">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
                        </li>
                        <li class="avatar avatar-xs">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="avatar">
                        </li>
                        <li class="avatar avatar-xs me-2">
                            <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+19</span></div>
                        </li>
                        <li class="small text-center">
                            Carolyn Ortiz, Frances Guerrero, and 20 joined group
                        </li>
                    </ul>
                    <!-- Join group END -->
                </div>
                <!-- Card body END -->
                <div class="card-footer pb-0">
                    <ul class="nav nav-tabs nav-bottom-line justify-content-center justify-content-md-start mb-0">
                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#group-tab-1"> Feed </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#group-tab-2"> About </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#group-tab-3"> Connections <span class="badge bg-success bg-opacity-10 text-success small"> 230</span> </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#group-tab-4"> Media</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#group-tab-5"> Videos</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#group-tab-6"> Events</a> </li>
                    </ul>
                </div>
            </div>
            <!-- Card END -->

            <div class="tab-content pt-0 pb-0 mb-0">

                <!-- Gruop Feed tab START -->
                <div class="tab-pane fade active show" id="group-tab-1">
                    <div class="row g-4">
                        <div class="col-lg-8 vstack gap-4">
                            <!-- Share feed START -->
                            <div class="card card-body">
                                <div class="d-flex mb-3">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs me-2">
                                        <a href="#"> <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt=""> </a>
                                    </div>
                                    <!-- Post input -->
                                    <form class="w-100">
                                        <input class="form-control pe-4 border-0" placeholder="Share your thoughts..." data-bs-toggle="modal" data-bs-target="#modalCreateFeed">
                                    </form>
                                </div>
                                <!-- Share feed toolbar START -->
                                <ul class="nav nav-pills nav-stack small fw-normal">
                                    <li class="nav-item">
                                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionPhoto"> <i class="bi bi-image-fill text-success pe-2"></i>Photo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionVideo"> <i class="bi bi-camera-reels-fill text-info pe-2"></i>Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class="bi bi-calendar2-event-fill text-danger pe-2"></i>Event </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#modalCreateFeed"> <i class="bi bi-emoji-smile-fill text-warning pe-2"></i>Feeling /Activity</a>
                                    </li>
                                    <li class="nav-item dropdown ms-xl-auto">
                                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#" id="feedActionShare" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare">
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Create a poll</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Ask a question </a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Help</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- Share feed toolbar END -->
                            </div>
                            <!-- Share feed END -->

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

                            <!-- Card feed item START -->
                            <div class="card">
                                <!-- Like post -->
                                <div class="border-bottom">
                                    <p class="small mb-0 px-4 py-2"><i class="bi bi-heart-fill text-danger pe-1"></i>Sam Lanson likes this post</p>
                                </div>
                                <!-- Card header START -->
                                <div class="card-header border-0 pb-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <!-- Avatar -->
                                            <div class="avatar me-2">
                                                <a href="#"> <img class="avatar-img rounded-circle" src="assets/images/logo/13.svg" alt=""> </a>
                                            </div>
                                            <!-- Title -->
                                            <div>
                                                <h6 class="card-title mb-0"> <a href="#!"> Apple Education </a></h6>
                                                <p class="mb-0 small">9 November at 23:29</p>
                                            </div>
                                        </div>
                                        <!-- Card share action menu -->
                                        <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardShareAction5" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction5">
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                                        </ul>
                                    </div>
                                    <!-- Card share action END -->
                                </div>
                                <!-- Card header START -->

                                <!-- Card body START -->
                                <div class="card-body pb-0">
                                    <p>Find out how you can save time in the classroom this year. Earn recognition while you learn new skills on iPad and Mac. Start  recognition your first Apple Teacher badge today!</p>
                                    <!-- Feed react START -->
                                    <ul class="nav nav-stack pb-2 small">
                                        <li class="nav-item">
                                            <a class="nav-link active text-secondary" href="#!"> <i class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i> Louis, Billy and 126 others </a>
                                        </li>
                                        <li class="nav-item ms-sm-auto">
                                            <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
                                        </li>
                                    </ul>
                                    <!-- Feed react END -->
                                </div>
                                <!-- Card body END -->
                                <!-- Card Footer START -->
                                <div class="card-footer py-3">
                                    <!-- Feed react START -->
                                    <ul class="nav nav-fill nav-stack small">
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 active" href="#!"> <i class="bi bi-heart pe-1"></i>Liked (56)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
                                        </li>
                                        <!-- Card share action dropdown START -->
                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link mb-0" id="cardShareAction6" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                                            </a>
                                            <!-- Card share action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction6">
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                                            </ul>
                                        </li>
                                        <!-- Card share action dropdown END -->
                                        <li class="nav-item">
                                            <a class="nav-link mb-0" href="#!"> <i class="bi bi-send-fill pe-1"></i>Send</a>
                                        </li>
                                    </ul>
                                    <!-- Feed react END -->
                                </div>
                                <!-- Card Footer END -->
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
                                    <p>He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty gay assistance joy.</p>
                                    <!-- info -->
                                    <ul class="list-unstyled mt-3 mb-0">
                                        <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> People: <strong> 20 Members </strong> </li>
                                        <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status: <strong> Public </strong> </li>
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

                <!-- Gruop About tab END -->
                <div class="tab-pane fade" id="group-tab-2">
                    <div class="card card-body">
                        <div class="my-sm-5 py-sm-5 text-center">
                            <!-- Icon -->
                            <i class="display-1 text-muted bi bi-person"> </i>
                            <!-- Title -->
                            <h4 class="mt-2 mb-3 text-body">No about details</h4>
                            <button class="btn btn-primary-soft btn-sm"> Click here to add </button>
                        </div>
                    </div>
                </div>
                <!-- Gruop About tab END -->

                <!-- Gruop Connections tab END -->
                <div class="tab-pane fade" id="group-tab-3">
                    <div class="card card-body">
                        <div class="my-sm-5 py-sm-5 text-center">
                            <!-- Icon -->
                            <i class="display-1 text-muted bi bi-people"> </i>
                            <!-- Title -->
                            <h4 class="mt-2 mb-3 text-body">No connections founds</h4>
                            <button class="btn btn-primary-soft btn-sm"> Click here to add </button>
                        </div>
                    </div>
                </div>
                <!-- Gruop Connections tab END -->

                <!-- Gruop Media tab END -->
                <div class="tab-pane fade" id="group-tab-4">
                    <div class="card card-body">
                        <div class="my-sm-5 py-sm-5 text-center">
                            <!-- Icon -->
                            <i class="display-1 text-muted bi bi-film"> </i>
                            <!-- Title -->
                            <h4 class="mt-2 mb-3 text-body">No media founds</h4>
                            <button class="btn btn-primary-soft btn-sm"> Click here to add </button>
                        </div>
                    </div>
                </div>
                <!-- Gruop Media tab END -->

                <!-- Gruop Videos tab END -->
                <div class="tab-pane fade" id="group-tab-5">
                    <div class="card card-body">
                        <div class="my-sm-5 py-sm-5 text-center">
                            <!-- Icon -->
                            <i class="display-1 text-muted bi bi-camera-reels"> </i>
                            <!-- Title -->
                            <h4 class="mt-2 mb-3 text-body">No videos founds</h4>
                            <button class="btn btn-primary-soft btn-sm"> Click here to add </button>
                        </div>
                    </div>
                </div>
                <!-- Gruop Videos tab END -->

                <!-- Gruop Events tab END -->
                <div class="tab-pane fade" id="group-tab-6">
                    <div class="card card-body">
                        <div class="my-sm-5 py-sm-5 text-center">
                            <!-- Icon -->
                            <i class="display-1 text-muted bi bi-calendar-plus"> </i>
                            <!-- Title -->
                            <h4 class="mt-2 mb-3 text-body">No events founds</h4>
                            <button class="btn btn-primary-soft btn-sm"> Click here to add </button>
                        </div>
                    </div>
                </div>
                <!-- Gruop Events tab END -->
            </div>

        </div>
    </div> <!-- Row END -->
</div>
