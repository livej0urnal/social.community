<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<?php debug($page->groups->page); ?>
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
                                            <?php if($group->group->admin != $page->id): ?>
                                                <a class="btn btn-danger-soft btn-sm leave-group" data-value="<?= $group->group->id ?>" href="<?= Url::to(['group/leave' , 'id' => $group->group->id]) ?>"> Leave group </a>
                                            <?php else : ?>
                                                <a class="btn btn-warning-soft btn-sm " href="<?= Url::to(['group/single', 'slug' => $group->group->slug]) ?>"> Manage group </a>
                                            <?php endif; ?>
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
