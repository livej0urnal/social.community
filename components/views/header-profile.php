<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>


    <!-- My profile START -->
    <div class="card">
        <!-- Cover image -->
        <div class="h-100px rounded-top"></div>
        <!-- Card body START -->
        <div class="card-body py-0">
            <div class="d-sm-flex align-items-start text-center text-sm-start">
                <div>
                    <!-- Avatar -->
                    <div class="avatar avatar-xxl mt-n5 mb-3">
                        <?= Html::img($page->image, ['alt' => $page->display_name, 'class' => 'avatar-img rounded-circle border border-white border-3']) ?>
                    </div>
                </div>
                <div class="ms-sm-4 mt-sm-3">
                    <!-- Info -->
                    <h1 class="mb-0 h5"><?= $page->page_name ?></h1>
                    <p><?= $page->display_name ?></p>
                </div>
                <!-- Button -->
                <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                    <button class="btn btn-danger-soft me-2" type="button" onclick="location.href = '<?= Url::to(['page/edit' , 'id' => $page->id]) ?>'"> <i class="bi bi-pencil-fill pe-1"></i> Edit profile </button>
                </div>
            </div>
            <!-- List profile -->
            <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> <?= $page->category->title ?></li>
            </ul>
        </div>
        <!-- Card body END -->
        <div class="card-footer mt-3 pt-2 pb-0">
            <!-- Nav profile pages -->
            <ul class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
                <li class="nav-item"> <a class="nav-link" href="<?= Url::to(['page/profile' , 'id' => $page->id]) ?>"> Posts </a> </li>
                <li class="nav-item"> <a class="nav-link" href="my-profile-about.html"> About </a> </li>
                <li class="nav-item"> <a class="nav-link" href="<?= Url::to(['profile/connections' , 'user' => $page->user_id]) ?>"> Connections <span class="badge bg-success bg-opacity-10 text-success small"> 230</span> </a> </li>
                <li class="nav-item"> <a class="nav-link" href="my-profile-media.html"> Media</a> </li>
                <li class="nav-item"> <a class="nav-link" href="my-profile-videos.html"> Videos</a> </li>
                <li class="nav-item"> <a class="nav-link" href="my-profile-events.html"> Events</a> </li>
                <li class="nav-item"> <a class="nav-link" href="my-profile-activity.html"> Activity</a> </li>
            </ul>
        </div>
    </div>
    <!-- My profile END -->
