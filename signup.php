<?php
session_start();

require_once "includes/login.check.php";

if (!empty($_SESSION['login'])) {
    header("Location: index.php");
}
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
        <?php
        include_once "includes/templates/signupForm.template.php";
        ?>
    </div>
</main>
</body>
<script src="assets/js/signup.js"></script>
<script src="assets/js/noscript.js"></script>
</html>
