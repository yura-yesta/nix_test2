<?php session_start(); ?>
<div class="page">
    <header class="header">
        <div class="container">
            <div class="header-top">
                <div class="logo ">
                    <h1>N-ix education</h1>
                </div>
                <div class="auth sign-in">

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

            <div class="auth-text"><h5>Authorization</h5></div>
            <div class="auth-text"><h5><?= $_SESSION['message']? : ''  ?></h5></div>
            <form method="post" action="">
                <div><input class="form-input" type="text" name="login" placeholder="Enter your login"></div>
                <div><input class="form-input" type="password" name="password" placeholder="Enter your password"></div>
                <div><button class="auth-button" type="submit" value="login" >Login</button></div>
                <div class="form-href-reg">Dont have account? Please  <a class="" href="register">registration</a> </div>
            </form>
        </div>
    </div>
</section>
    <?php $_SESSION['message'] = '' ?>