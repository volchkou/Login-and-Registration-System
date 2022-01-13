<?php
session_start();
require_once "includes/login.check.php";

if (!empty($_SESSION['login'])) {
    header("Location: index.php");
}
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
        <?php
        include_once "includes/templates/loginForm.template.php";
        ?>
    </div>
</main>
</body>
<script src="assets/js/login.js"></script>
<script src="assets/js/noscript.js"></script>
</html>
