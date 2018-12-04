<?php
use App\Constant\CommonConstant;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->element('common_header', ['systemName' => CommonConstant::SYSTEM_NAME]) ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #343a40;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-brand">メール配信システム</span>
    </nav>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
