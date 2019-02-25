<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>

<div class="container">
    <?php foreach($articles as $article): ?>
        <div class="row mt-4">
            <div class="col-sm-12">
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
                    <div class="col-md-4">
                        <?= $this->Html->link($article->user->username,
                            [
                                'controller' => 'Users',
                                'action' => 'view',
                                $article->user->id
                            ],
                            [
                                'class' => 'text-info'
                            ]
                        ) ?>
                        <p class="mt-3 text-muted"><?= h($article->created->format('Y-m-d h:m')) ?></p>
                    </div>
                    <div class="col-md-8">
                        <?= mb_strimwidth(nl2br(h($article->body)), 0, 200)?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . ('最初')) ?>
        <?= $this->Paginator->prev('< ' . ('前')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(('次') . ' >') ?>
        <?= $this->Paginator->last(('最後') . ' >>') ?>
    </ul>
</div>
