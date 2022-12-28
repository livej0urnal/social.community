<?php
?>

<li class="nav-item ms-2 dropdown">
    <?php if($page) : ?>
    <a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
        <img class="avatar-img rounded-2" src="/images/avatar/06.jpg" alt="">
    </a>
    <?php else : ?>
    1
    <?php endif; ?>
    <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
        <!-- Profile info -->
        <li class="px-3">
            <div class="d-flex align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar me-3">
                    <img class="avatar-img rounded-circle" src="/images/avatar/06.jpg" alt="avatar">
                </div>
                <div>
                    <a class="h6 stretched-link" href="#">Lori Ferguson</a>
                    <p class="small m-0">Web Developer</p>
                </div>
            </div>
            <a class="dropdown-item btn btn-primary-soft btn-sm my-2 text-center" href="my-profile.html">View profile</a>
        </li>
        <!-- Links -->
        <li><a class="dropdown-item" href="settings.html"><i class="bi bi-gear fa-fw me-2"></i>Settings & Privacy</a></li>
        <li>
            <a class="dropdown-item" href="https://support.webestica.com/" target="_blank">
                <i class="fa-fw bi bi-life-preserver me-2"></i>Support
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="docs/index.html" target="_blank">
                <i class="fa-fw bi bi-card-text me-2"></i>Documentation
            </a>
        </li>
        <li class="dropdown-divider"></li>
        <li><a class="dropdown-item bg-danger-soft-hover" href="<?= \yii\helpers\Url::to(['site/logout']) ?>"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
        <li> <hr class="dropdown-divider"></li>
        <!-- Dark mode switch START -->
        <li>
            <div class="modeswitch-wrap" id="darkModeSwitch">
                <div class="modeswitch-item">
                    <div class="modeswitch-icon"></div>
                </div>
                <span>Dark mode</span>
            </div>
        </li>
        <!-- Dark mode switch END -->
    </ul>
</li>
