<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
?>


<div class="container">
    <div class="row g-4">
        <!-- Main content START -->
        <div class="col-lg-8 mx-auto">
            <div class="vstack gap-4">
                <!-- Blog single START -->
                <div class="card card-body">
                    <?= Html::img($article->image, ['class' => 'rounded']) ?>
                    <div class="mt-4">
                        <!-- Tag -->
                        <a href="<?= Url::to(['news/category' , 'id' => $article->category->id]) ?>" class="badge bg-danger bg-opacity-10 text-danger mb-2 fw-bold"><?= $article->category->title ?></a>
                        <!-- Title info -->
                        <h1 class="mb-2 h2"><?= $article->title ?></h1>
                        <ul class="nav nav-stack gap-3 align-items-center">
                            <li class="nav-item">
                                <div class="nav-link">
                                    by <a href="<?= Url::to(['profile/friend', 'id' => $article->page->id]) ?>" class="text-reset btn-link"><?= $article->page->page_name ?></a>
                                </div>
                            </li>
                            <li class="nav-item"> <i class="bi bi-calendar-date pe-1"></i><?php echo Yii::$app->formatter->asDate($article->public_date, 'long'); ?></li>
                            <li class="nav-item"> <i class="bi bi-clock pe-1"></i><?php echo rand(1,10); ?> min read</li>
                        </ul>
                        <p>
                            <?= $article->content ?>
                        </p>
                    </div>
                </div>
                <!-- Card END -->
            </div>
        </div>
        <!-- Main content END -->
    </div> <!-- Row END -->
</div>