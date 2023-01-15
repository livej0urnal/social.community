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
                    <?php if(empty($page->feeds)) : ?>
                    <ul class="list-unstyled">

                        <!-- Notif item -->
                        <li>
                            <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                                <!-- Avatar -->
                                <div class="avatar text-center">
                                    <img class="avatar-img rounded-circle" src="/images/avatar/01.jpg" alt="">
                                </div>
                                <!-- Info -->
                                <div class="mx-sm-3 my-2 my-sm-0">
                                    <p class="small mb-2"><b>Judy Nguyen</b> sent you a friend request.</p>
                                    <!-- Button -->
                                    <div class="d-flex">
                                        <button class="btn btn-sm py-1 btn-primary me-2">Accept</button>
                                        <button class="btn btn-sm py-1 btn-danger-soft">Delete</button>
                                    </div>
                                </div>
                                <!-- Action -->
                                <div class="d-flex ms-auto">
                                    <p class="small me-5 text-nowrap">Just now</p>
                                    <!-- Notification action START -->
                                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                                        <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2"
                                           id="cardNotiAction1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction1">
                                            <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                                            <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy
                                                    Nguyen </a></li>
                                        </ul>
                                    </div>
                                    <!-- Notification action END -->
                                </div>
                            </div>
                        </li>
                        <!-- Notif item -->
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
