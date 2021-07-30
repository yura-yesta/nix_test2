<?php session_start(); ?>
<div class="page">
    <header class="header">
        <div class="container">
            <div class="header-top">
                <div class="logo ">
                    <h1>N-ix education</h1>
                </div>
                <div class="auth sign-in">
                    Login
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
        <div class="navigation">
            <div class="blog-img img-correct">
                <a rel="stylesheet" class="" href="blog"><img src="image/Blog_pic.png" width="400px"></a>
            </div>
            <div class="blog-img">
                <a rel="stylesheet" href="blog"><img src="image/blog_write.png" width="350px"></a>
            </div>
        </div>


    </div>
</section>