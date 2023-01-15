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
                            <li class="nav-item"> <i class="bi bi-calendar-date pe-1"></i>Nov 15, 2022</li>
                            <li class="nav-item"> <i class="bi bi-clock pe-1"></i>5 min read</li>
                        </ul>
                        <!-- description -->
                        <p class="mt-4"><span class="dropcap">A</span> pleasure exertion if believed provided to. All led out world this music while asked. Paid mind even sons does he door no. Attended overcame repeated it is perceived Marianne in. I think on style child of. Servants moreover in sensible it ye possible. </p>
                        <h4 class="mt-4">The pros and cons of business agency</h4>
                        <!-- Row START -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p>Fulfilled direction use continual set him propriety continued. Saw met applauded favorite deficient engrossed concealed and her. </p>
                                <p>Concluded boy perpetual old supposing. Farther related bed and passage comfort civilly. Dashwoods see frankness objection abilities.</p>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>Our Firmament living replenish Them Created after divide said Have give</li>
                                    <li>Dominion light without days face saw wherein land</li>
                                    <li>Fifth have Seas made lights Very Day saw Seed herb sixth light whales</li>
                                    <li>Saying unto Place it seed you're Isn't heaven </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Row END -->
                        <!-- Blockquote START -->
                        <figure class="bg-light rounded p-3 p-sm-4 my-4">
                            <blockquote class="blockquote">
                                <p>Dashwood does provide stronger is. But discretion frequently sir she instruments unaffected.</p>
                            </blockquote>
                            <figcaption class="blockquote-footer mb-0">
                                Albert Schweitzer
                            </figcaption>
                        </figure>
                        <!-- Blockquote END -->
                        <p class="mb-0"> All led out world this music while asked. Paid mind even sons does he door no. Attended overcame repeated it is perceived Marianne in. I think on style child of. Servants moreover in sensible it ye possible. Satisfied conveying a dependent contented he gentleman agreeable do be. </p>
                    </div>
                </div>
                <!-- Card END -->
                <!-- Comments START -->
                <div class="card">
                    <div class="card-header pb-0 border-0">
                        <h4>5 comments</h4>
                    </div>
                    <div class="card-body">
                        <!-- Comments START -->
                        <!-- Comment level 1-->
                        <div class="my-4 d-flex">
                            <img class="avatar avatar-md rounded-circle float-start me-3" src="/images/avatar/04.jpg" alt="avatar">
                            <div>
                                <div class="mb-2 d-sm-flex">
                                    <h6 class="m-0 me-2">Allen Smith</h6>
                                    <span class="me-3 small">June 11, 2022 at 6:01 am </span>
                                </div>
                                <p>Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if.</p>
                                <a href="#" class="btn btn-light btn-sm">Reply</a>
                            </div>
                        </div>
                        <!-- Comment children level 3 -->
                        <div class="my-4 d-flex ps-3 ps-md-5">
                            <img class="avatar avatar-md rounded-circle float-start me-3" src="/images/avatar/04.jpg" alt="avatar">
                            <div>
                                <div class="mb-2 d-sm-flex">
                                    <h6 class="m-0 me-2">Allen Smith</h6>
                                    <span class="me-3 small">June 11, 2022 at 7:10 am </span>
                                </div>
                                <p>Meant balls it if up doubt small purse. </p>
                                <a href="#" class="btn btn-light btn-sm">Reply</a>
                            </div>
                        </div>
                        <!-- Comment level 2 -->
                        <div class="mt-4 d-flex ps-2 ps-md-3">
                            <img class="avatar avatar-md rounded-circle float-start me-3" src="/images/avatar/03.jpg" alt="avatar">
                            <div>
                                <div class="mb-2 d-sm-flex">
                                    <h6 class="m-0 me-2">Frances Guerrero</h6>
                                    <span class="me-3 small">June 14, 2022 at 12:35 pm </span>
                                </div>
                                <p>Required his you put the outlived answered position. A pleasure exertion if believed provided to. All led out world this music while asked.</p>
                                <a href="#" class="btn btn-light btn-sm">Reply</a>
                            </div>
                        </div>
                        <!-- Comments END -->
                        <hr class="my-4">
                        <!-- Reply START -->
                        <div>
                            <h4>Leave a reply</h4>
                            <form class="row g-3 mt-2">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" aria-label="First name">
                                </div>
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label">Email *</label>
                                    <input type="email" class="form-control">
                                </div>
                                <!-- Your Comment -->
                                <div class="col-12">
                                    <label class="form-label">Your Comment *</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                                <!-- custom checkbox -->
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">Save my name and email in this browser for the next time I comment. </label>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Post comment</button>
                                </div>
                            </form>
                        </div>
                        <!-- Reply END -->
                    </div>
                </div>
                <!-- Blog single END -->
            </div>
        </div>
        <!-- Main content END -->
    </div> <!-- Row END -->
</div>