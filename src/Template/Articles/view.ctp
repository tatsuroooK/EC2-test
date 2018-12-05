<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>

<div class="articles view columns content">
    <span class="badge badge-success"><?= $article->created->format('Y-m-d') ?></span>
    <div class="mt-3 p-3">
        <h3 class="text-dark font-weight-bold"><?= h($article->title) ?></h3>
        <span class="ml-auto"><?= h($article->user->username) ?></span>
    </div>
    <hr>
    <div class="p-3">
        <?= nl2br(h($article->body)) ?>
    </div>
</div>
