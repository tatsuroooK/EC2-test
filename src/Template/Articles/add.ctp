<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<div class="articles form columns content">
    <h2 class="mt-5">記事を書く</h2>
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
                        'rows' => 20
                    ]) ?>
                </div>
                <hr>
                <div class="form-group">
                    <label>Youtubeの動画を掲載する</label>
                    <?= $this->Form->control('youtube_url', [
                        'label' => false,
                        'type' => 'text',
                        'placeholder' => 'watch?v= 以降の文字列を入力',
                        'required' => false,
                    ]) ?>
                    <span class="badge badge-danger">注意</span>
                    <small class="">掲載したい動画のURLの&nbsp;<strong>watch?v=</strong>&nbsp;以降の文字を入力してください（以下例の赤線部分）</small>
                    <?= $this->Html->image('youtube-url-sample', ['alt' => 'img'], ['class' => 'p-3']); ?>
                </div>

                <div class="mt-3" style="float:right;">
                    <?= $this->Form->button('下書きに保存',
                        [
                            'class' => 'btn btn-outline-info',
                            'id' => 'draft',
                            'type' => 'submit'
                        ]
                    ) ?>
                </div>
                <div class="mt-3" style="float:right;">
                    <?= $this->Form->button('投稿する',
                        [
                            'class' => 'btn btn-info',
                            'id' => 'submit',
                            'type' => 'submit'
                        ]
                    ) ?>
                </div>
            </div>
        </form>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
