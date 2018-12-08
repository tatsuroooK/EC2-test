<div class="container login-content mt-5">
    <?= $this->Form->create() ?>
    <fieldset>
        <h2 class="form-signin-headingm">ログイン</h2>
        <hr>
        <?= $this->Form->control('loginid', ['label' => 'ログインID',]) ?>
        <?= $this->Form->control('password', ['label' => 'パスワード',]) ?>
        <button type="submit" class="btn btn-info btn-block">ログイン</button>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->css('Accounts/login.css') ?>
