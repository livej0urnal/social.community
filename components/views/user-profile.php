<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
?>

<li class="nav-item ms-2 dropdown">
    <?php if($page) : ?>
        <a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
            <?= Html::img($page->image, ['alt' => $page->display_name, 'class' => 'avatar-img rounded-2']) ?>
        </a>
        <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
            <!-- Profile info -->
            <li class="px-3">
                <div class="d-flex align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar me-3">
                        <?= Html::img($page->image, ['alt' => $page->display_name, 'class' => 'avatar-img rounded-circle']) ?>
                    </div>
                    <div>
                        <a class="h6 stretched-link" href="<?= Url::to(['page/profile', 'id' => $page->id]) ?>"><?= $page->display_name ?></a>
                        <p class="small m-0"><?= $page->category->title ?></p>
                        <?php if($page->delete == '1'): ?>
                        <p class="text-danger"> Page deleted!</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($page->delete != '1'): ?>
                <a class="dropdown-item btn btn-primary-soft btn-sm my-2 text-center" href="<?= Url::to(['page/profile', 'id' => $page->id]) ?>">View profile</a>
                <?php endif; ?>
            </li>
            <!-- Links -->
            <li><a class="dropdown-item" href="<?= Url::to(['page/edit', 'id' => $page->id]) ?>"><i class="bi bi-gear fa-fw me-2"></i>Settings</a></li>
            <li class="dropdown-divider"></li>
            <li><a class="dropdown-item bg-danger-soft-hover" href="<?= \yii\helpers\Url::to(['site/logout']) ?>"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
        </ul>
    <?php else : ?>
        <a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="avatar-img rounded-2" src="/images/avatar/avatar.png" alt="">
        </a>
        <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
            <!-- Profile info -->
            <li class="px-3">
                <div class="d-flex align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar me-3">
                        <img class="avatar-img rounded-circle" src="/images/avatar/avatar.png" alt="avatar">
                    </div>
                    <div>
                        <a class="h6 stretched-link" href="#"><?= $user_account->email ?></a>
                        <p class="small m-0">New user</p>
                    </div>
                </div>
            </li>
            <li class="dropdown-divider"></li>
            <li><a class="dropdown-item bg-danger-soft-hover" href="<?= \yii\helpers\Url::to(['site/logout']) ?>"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
        </ul>
    <?php endif; ?>

</li>
