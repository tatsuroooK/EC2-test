<?php
use App\Statics\User;
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <div class="container">
        <?= $this->Html->link('Acappella Knowledge',
            [
                'controller' => 'articles',
                'action' => 'index'
            ],
            [
                'class' => 'navbar-brand',
                'style' => 'font-family:pt sans caption,Helvetica,Arial,sans-serif'
            ]
        ) ?>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?= $this->Html->link('Home',
                        [
                            'controller' => 'articles',
                            'action' => 'index'
                        ],
                        [
                            'class' => 'nav-link'
                        ]
                    ) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('記事を書く',
                        [
                            'controller' => 'articles',
                            'action' => 'add'
                        ],
                        [
                            'class' => 'nav-link'
                        ]
                    ) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('記事一覧',
                        [
                            'controller' => 'articles',
                            'action' => 'myArticles'
                        ],
                        [
                            'class' => 'nav-link'
                        ]
                    ) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('ログアウト',
                        [
                            'controller' => 'users',
                            'action' => 'logout'
                        ],
                        [
                            'class' => 'nav-link'
                        ]
                    ) ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="ht-header-content" style="margin-top:50px; background-color:#1A1B26;">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="p-3 pl-5 mt-4 text-white">Share your knowledge</h1>
            <h3 class="p-3 pl-5 mb-5 text-white">for your team</h3>
        </div>
            <div class="col-lg-6"></div>
        </div>
    </div>
</div>


