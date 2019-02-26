<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<?= $this->Html->css('Articles/common_articles') ?>
<?= $this->Html->script('thumbup') ?>
<?php use App\Statics\User; ?>

<div class="container">
    <div class="article-component">
        <div class="mt-3">
            <span class="badge badge-success"><?= $article->created->format('Y-m-d') ?></span>
        </div>
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
    <hr>
    <div class="mt-3">
        <span class="float-right"><i class="far fa-lg fa-thumbs-up" id="thumbup"></i></span>
    </div>
    <?= $this->Form->create() ?>
        <?= $this->Form->hidden('articleid', ['value' => $article->id, 'id' => 'article-id']) ?>
        <?= $this->Form->hidden('thumup_url', ['value' => $thumbupUrl, 'id' => 'thumbup-url']) ?>
        <?= $this->Form->hidden('userid', ['value' => User::$id, 'id' => 'user-id']) ?>
    <?= $this->Form->end() ?>
</div>
