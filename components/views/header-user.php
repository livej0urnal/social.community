<?php
?>

<li class="nav-item ms-2">
    <a class="nav-link icon-md btn btn-light p-0" href="<?= \yii\helpers\Url::to(['message/single']) ?>">
        <i class="bi bi-chat-left-text-fill fs-6"> </i>
    </a>
</li>
<li class="nav-item ms-2">
    <a class="nav-link icon-md btn btn-light p-0" href="<?= \yii\helpers\Url::to(['page/edit' , 'id' => $page->id]) ?>">
        <i class="bi bi-gear-fill fs-6"> </i>
    </a>
</li>
<li class="nav-item dropdown ms-2">
    <a class="nav-link icon-md btn btn-light p-0" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
        <span class="badge-notif animation-blink"></span>
        <i class="bi bi-bell-fill fs-6"> </i>
    </a>
    <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0" aria-labelledby="notifDropdown">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">4 new</span></h6>
                <a class="small" href="#">Clear all</a>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush list-unstyled p-2">
                    <!-- Notif item -->
                    <li>
                        <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                            <div class="avatar text-center d-none d-sm-inline-block">
                                <img class="avatar-img rounded-circle" src="/images/avatar/01.jpg" alt="">
                            </div>
                            <div class="ms-sm-3">
                                <div class=" d-flex">
                                    <p class="small mb-2"><b>Judy Nguyen</b> sent you a friend request.</p>
                                    <p class="small ms-3 text-nowrap">Just now</p>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-sm py-1 btn-primary me-2">Accept </button>
                                    <button class="btn btn-sm py-1 btn-danger-soft">Delete </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Notif item -->
                    <li>
                        <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3 position-relative">
                            <div class="avatar text-center d-none d-sm-inline-block">
                                <img class="avatar-img rounded-circle" src="/images/avatar/02.jpg" alt="">
                            </div>
                            <div class="ms-sm-3 d-flex">
                                <div>
                                    <p class="small mb-2">Wish <b>Amanda Reed</b> a happy birthday (Nov 12)</p>
                                    <button class="btn btn-sm btn-outline-light py-1 me-2">Say happy birthday 🎂</button>
                                </div>
                                <p class="small ms-3">2min</p>
                            </div>
                        </div>
                    </li>
                    <!-- Notif item -->
                    <li>
                        <a href="#" class="list-group-item list-group-item-action rounded d-flex border-0 mb-1 p-3">
                            <div class="avatar text-center d-none d-sm-inline-block">
                                <div class="avatar-img rounded-circle bg-success"><span class="text-white position-absolute top-50 start-50 translate-middle fw-bold">WB</span></div>
                            </div>
                            <div class="ms-sm-3">
                                <div class="d-flex">
                                    <p class="small mb-2">Webestica has 15 like and 1 new activity</p>
                                    <p class="small ms-3">1hr</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- Notif item -->
                    <li>
                        <a href="#" class="list-group-item list-group-item-action rounded d-flex border-0 p-3 mb-1">
                            <div class="avatar text-center d-none d-sm-inline-block">
                                <img class="avatar-img rounded-circle" src="/images/logo/12.svg" alt="">
                            </div>
                            <div class="ms-sm-3 d-flex">
                                <p class="small mb-2"><b>Bootstrap in the news:</b> The search giant’s parent company, Alphabet, just joined an exclusive club of tech stocks.</p>
                                <p class="small ms-3">4hr</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <a href="#" class="btn btn-sm btn-primary-soft">See all incoming activity</a>
            </div>
        </div>
    </div>
</li>
<!-- Notification dropdown END -->
