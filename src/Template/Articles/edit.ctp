<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<div class="articles form columns content">
    <h2 class="mt-5">記事の編集</h2>
    <hr>
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
                <div class="form-group">
                    <label>Youtubeの動画を掲載する</label>
                    <?= $this->Form->control('youtube_url', [
                        'label' => false,
                        'type' => 'text',
                        'placeholder' => '動画のURLを入力してください',
                        'required' => false,
                    ]) ?>
                </div>
                <button type="submit" class="btn btn-primary">投稿</button>
            </div>
        </form>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
