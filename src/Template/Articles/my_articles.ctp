<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>

<div class="container mt-5">
    <?php foreach($articles as $article): ?>
        <div class="row m-5">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    <a href="">
                        <h2 class="post-title">
                            <?= $this->Html->link($article->title, [
                                'controller' => 'Articles',
                                'action' => 'view',
                                $article->id
                            ]) ?>
                        </h2>
                        <h3 class="post-subtitle">
                        </h3>
                    </a>
                    <p class="post-meta">Posted by<a href="#"><?= $this->Html->link($article->user->username, ['controller' => 'Users', 'action' => 'view', $article->user->id]) ?></a>datetime</p>
                </div>
                <hr>
            </div>
        </div>
    <?php endforeach; ?>
</div>
