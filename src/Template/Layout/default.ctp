<?php

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->element('common_header') ?>
</head>
<body>
    <?= $this->element('navbar') ?>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        <div class="mb-5 footer-margin">
        </div>
    </footer>
</body>
</html>
