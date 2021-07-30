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
<section class="container">
    <div class="authorization">

        <div class="">
            <img src="image/error-404.png" width="700px">
        </div>
    </div>
</section>