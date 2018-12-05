<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>

<?php 
use App\Statics\User;

?>

<div class="container">
    <h2 class="mt-5"><?= User::$username.'さんの記事'?></h2>
    <hr>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><strong>タイトル</strong></th>
                <th scope="col"><strong>執筆日時</strong></th>
                <th scope="col" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= h($article->title) ?></td>
                <td><?= h($article->created->format('Y-m-d h:m:s')) ?></td>
                <td class="actions">
                    <?= $this->Html->link('閲覧', ['controller' => 'articles', 'action' => 'view', $article->id], ['class' => 'btn btn-success btn-sm']) ?>
                    <?= $this->Html->link('編集', ['controller' => 'articles', 'action' => 'edit', $article->id], ['class' => 'btn btn-success btn-sm']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
