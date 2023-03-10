<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<div class="container">
    <div class="row g-4">
        <!-- Main content START -->
        <div class="col-lg-8">
            <div class="bg-mode p-4">
                <?php if (!empty($posts)) : ?>
                    <h1 class="h4 mb-4">Latest blogs</h1>

                    <?php foreach ($posts as $post) : ?>
                        <!-- Blog item START -->
                        <div class="card bg-transparent border-0">
                            <div class="row g-3">
                                <div class="col-4">
                                    <!-- Blog image -->
                                    <?= Html::img($post->image, ['class' => 'rounded']) ?>
                                </div>
                                <div class="col-8">
                                    <!-- Blog caption -->
                                    <a href="<?= Url::to(['news/category', 'id' => $post->category->id]) ?>"
                                       class="badge bg-danger bg-opacity-10 text-danger mb-2 fw-bold"><?= $post->category->title ?></a>
                                    <h5>
                                        <a href="<?= Url::to(['news/single', 'slug' => $post->slug]) ?>" class="btn-link stretched-link text-reset fw-bold">
                                            <?= $post->title ?>
                                        </a>
                                    </h5>
                                    <div class="d-none d-sm-inline-block">
                                        <p class="mb-2">
                                            <?php echo \yii\helpers\StringHelper::truncate($post->content, 100); ?>
                                        </p>
                                        <!-- BLog date -->
                                        <a class="small text-secondary" href="<?= Url::to(['news/single', 'slug' => $post->slug]) ?>">
                                            <i class="bi bi-calendar-date pe-1"></i>
                                            <?php echo Yii::$app->formatter->asDate($post->public_date, 'long'); ?>
                                        </a><br><br>
                                        <a href="<?= Url::to(['profile/friend', 'id' => $post->page->id]) ?>" class="small text-secondary">
                                            <i class="bi bi-bag pe-1"></i>
                                            <?= $post->page->page_name ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Blog item END -->
                        <hr class="my-4">
                    <?php endforeach; ?>
                    <?php echo LinkPager::widget([
                        'pagination' => $pages,
                        'options' => ['class' => 'pagination tab-pagination d-inline-block d-md-flex justify-content-center'],
                        'linkOptions' => ['class' => 'page-link'],
                    ]); ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- Main content END -->

        <!-- Right sidebar START -->
        <div class="col-lg-4">
            <?= \app\components\SidebarBlogWidget::widget() ?>
        </div> <!-- Row END -->
    </div>
</div>