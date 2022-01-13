<?php
session_start();
require_once "includes/login.check.php";
?>

<!doctype html>
<html lang="en">
<?php
include_once "includes/templates/head.template.php";
?>
<body>
    <?php
    include_once "includes/templates/header.template.php";
    ?>
    <main class="content">
        <div class="container">
            <?php if (!empty($_SESSION['login'])): ?>
                <h1 class="content__welcome">Hello <span><?= $_SESSION["name"] ?></span></h1>
            <?php else: ?>
                <h1 class="content__header">Please login or register first</h1>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>