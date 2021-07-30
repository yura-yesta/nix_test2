<?php session_start();
$id = $_SESSION['user']['id'];
?>
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
            <div class="auth-text"><h5><?= $_SESSION['message'] ?></h5></div>
            <div><?php  echo file_exists("../public/image/$id/logo.jpeg")? "<img src='/image/$id/logo.jpeg' width='100'>" : ' There will be your logo:<form action="/changeInfo" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit">
</form>'; ?></div>
            <?php  echo file_exists("../public/image/$id/logo.jpeg")? '<form action="/changeInfo" method="post" enctype="multipart/form-data">
    
    <input type="file" name="image">
    <input type="submit" placeholder="go">
</form>' : '' ?>


            <form  action="" method="post">
                <div>Login - <?= $_SESSION['user']['login']; ?> : <input class="account-input" type="text" name="login" placeholder="change your login" ></div>
                <div>Name - <?= $_SESSION['user']['name']; ?> : <input class="account-input" type="text" name="name" placeholder="change your name" ></div>
                <div>Password - <?= $_SESSION['user']['password']; ?> : <input class="account-input" type="text" name="password" placeholder="change your  password" ></div>
                <button type="submit">Change all</button>

                <a href="/exit">вийти</a>

            </form>
        </div>
    </div>
</section>
    <?php $_SESSION['message'] = '' ?>
