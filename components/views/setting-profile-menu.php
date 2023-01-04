<?php
?>
<!-- Offcanvas body -->
<div class="offcanvas-body p-0">
    <!-- Card START -->
    <div class="card w-100">
        <!-- Card body START -->
        <div class="card-body">

            <!-- Side Nav START -->
            <ul class="nav nav-tabs nav-pills nav-pills-soft flex-column fw-bold gap-2 border-0">
                <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0 active" href="#nav-setting-tab-1" data-bs-toggle="tab"> <img class="me-2 h-20px fa-fw" src="/images/icon/person-outline-filled.svg" alt=""><span>Account </span></a>
                </li>
                <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0" href="#nav-setting-tab-6" data-bs-toggle="tab"> <img class="me-2 h-20px fa-fw" src="/images/icon/trash-var-outline-filled.svg" alt=""><span>Close account </span></a>
                </li>
            </ul>
            <!-- Side Nav END -->

        </div>
        <!-- Card body END -->
        <!-- Card footer -->
        <div class="card-footer text-center py-2">
            <a class="btn btn-link text-secondary btn-sm" href="<?= \yii\helpers\Url::to(['page/profile' , 'id' => $user_profile->id]) ?>">View Profile </a>
        </div>
    </div>
    <!-- Card END -->
</div>
<!-- Offcanvas body -->
