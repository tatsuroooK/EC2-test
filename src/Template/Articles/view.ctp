<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>

<?php
use App\Statics\User;;

?>

<div class="articles view columns content">
    <span class="badge badge-success"><?= $article->created->format('Y-m-d') ?></span>
    <div class="p-3">
        <h3 class="text-dark font-weight-bold"><?= h($article->title) ?></h3>
        <span class="ml-auto"><?= h($article->user->username) ?></span>
        <?php if ($article->user->id == User::$id): ?>
            <span class="badge badge-danger float-right"><?= $this->Html->link('編集する', ['controller' => 'articles', 'action' => 'edit', $article->id], ['class' => 'text-white']) ?></span>
        <?php endif; ?>
    </div>
    <hr>
    <div class="p-3">
        <?= nl2br(h($article->body)) ?>
    </div>
    <?php if(!empty($article->youtube_url)): ?>
        <div class="video clear-both mt-5">
            <iframe width="100" height="65" src="https://www.youtube.com/embed/<?= $article->youtube_url ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    <?php endif; ?>
</div>
