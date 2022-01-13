<header class="header">
    <div class="container">
        <div class="header__wrapper">
            <div class="header__logo">
                <a href="index.php"><img src="assets/img/logo.png" alt="logo"></a>
            </div>
            <nav class="header__menu">
                <?php if (!empty($_SESSION['login'])): ?>
                    <a href="includes/logout.inc.php">Log Out</a>
                <?php else: ?>
                    <a href="login.php">Log In</a>
                    <a href="signup.php">Sign Up</a>
                <?php endif; ?>

            </nav>
        </div>
    </div>
</header>

