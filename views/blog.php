<?php session_start(); ?>
<div class="page">
    <header class="header">
        <div class="container">
            <div class="header-top">
                <div class="logo ">
                    <h1>N-ix education</h1>
                </div>

            </div>
        </div>
    </header>
    <menu class="menu">
        <div class="container">
            <nav class="nav">
                <a class="nav_link" href="/">home</a>
                <a class="nav_link" href="blog">blog</a>
                <?= $_SESSION['user']['name'] ? "<a href='/account'>Hello {$_SESSION['user']['name']}</a>".' | '.'<a href="/exit">exit</a>' : '<a class="nav_link" href="login">Sign in</a>' ?>
            </nav>
        </div>
    </menu>
    <section class="content">
        <div class="container">
            <div class="blog">
                <? foreach ($data as $item){ ?>
                    <div class="blog-inside">
                        <h4 class="name">Article: <?= $item['article'] ?></h4>
                        <h6 class="name">Author: <?= $item['author'] ?></h6>
                        <div class="article-text">
                            <?= $item['text'] ?>
                        </div>
                    </div>
                <? }; ?>
                <!--                <div class="blog-inside">-->
                <!--                    <h4 class="name">name article</h4>-->
                <!--                    <h6 class="name">Author: name</h6>-->
                <!--                    <div class="article-text">-->
                <!--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="blog-inside">-->
                <!--                    <h4 class="name">name article</h4>-->
                <!--                    <h6 class="name">Author: name</h6>-->
                <!--                    <div class="article-text">-->
                <!--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="blog-inside">-->
                <!--                    <h4 class="name">name article</h4>-->
                <!--                    <h6 class="name">Author: name</h6>-->
                <!--                    <div class="article-text">-->
                <!--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="blog-inside">-->
                <!--                    <h4 class="name">name article</h4>-->
                <!--                    <h6 class="name">Author: name</h6>-->
                <!--                    <div class="article-text">-->
                <!--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.-->
                <!--                    </div>-->
                <!--                </div>-->




            </div>
        </div>
    </section>