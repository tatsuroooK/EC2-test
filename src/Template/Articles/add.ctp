<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<div class="articles form columns content">
    <?= $this->Form->create($article, ['noValidate' => true]) ?>
    <fieldset>
        <form>
            <div class="card mt-5 mb-5 p-5">
                <div class="form-group">
                    <label for="">タイトル</label>
                    <?= $this->Form->control('title', [
                        'label' => false,
                        'type' => 'text',

                    ]) ?>
                </div>
                <div class="form-group">
                    <label for="">本文</label>
                    <?= $this->Form->control('body', [
                        'label' => false,
                        'type' => 'textarea',
                    ]) ?>
                </div>
                <button type="submit" class="btn btn-primary">投稿</button>
            </div>
        </form>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
