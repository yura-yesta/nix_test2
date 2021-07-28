<div class="page">
    <header class="header">
        <div class="container">
            <div class="header-top">
                <div class="logo ">
                    <h1>N-ix education</h1>
                </div>
                <div class="auth sign-in">
                    sign-in
                </div>
            </div>
        </div>
    </header>
    <menu class="menu">
        <div class="container">
            <nav class="nav">
                <a class="nav_link" href="/">home</a>
                <a class="nav_link" href="blog">blog</a>
                <a class="nav_link" href="login">sign-in</a>
            </nav>
        </div>
    </menu>
    <section class="container">

        <div class="authorization">

            <div class="">
                <div class="auth-text"><h5><?= $_SESSION['authMessage']; ?></h5></div>
                <div class="auth-text"><h5>Registration</h5></div>
                <form  action="reg-form" method="post">
                    <div><input class="form-input" type="text" name="login" placeholder="Enter your login"></div>
                    <div><input class="form-input" type="text" name="name" placeholder="Enter your name"></div>
                    <div><input class="form-input" type="password" name="pwd" placeholder="Enter your password"></div>
                    <div><button class="auth-button" type="submit" value="login" >Register</button></div>
                    <div class="form-href-reg">You have account? Please  <a class="" href="/login">Login</a> </div>
                </form>
            </div>
        </div>
    </section>
