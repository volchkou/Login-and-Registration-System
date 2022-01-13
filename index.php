<?php
session_start();
require_once "includes/login.check.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>MANAO - Test Task</title>
</head>
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