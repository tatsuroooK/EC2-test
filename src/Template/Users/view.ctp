<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users view columns content">
    <div class="row">
        <div class="col-4">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?= h($user->username) ?></h3>

                <p class="text-muted text-center"><?= h($user->self_introduction) ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b>
                        <a class="float-right">13,287</a>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
        </div>
        <div class="col-8">
            <?php foreach($ownArticles as $article): ?>
            <div class="row m-5">
                <div class="col-lg-8 col-md-10 mx-aut">
                    <h4>
                        <?= $this->Html->link($article->title,
                            [
                                'controller' => 'Articles',
                                'action' => 'view',
                                $article->id
                            ],
                            [
                                'class' => 'text-dark font-weight-bold'
                            ]
                        ) ?>
                    </h4>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div>
                                <?= h($article->body) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <?php endforeach; ?>
        </div>
    </div>
</div>
