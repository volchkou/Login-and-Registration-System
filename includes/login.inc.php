<?php

if ($_POST["request"] === "xmlhttprequest") {
    $username = htmlentities($_POST["username"], ENT_QUOTES, 'UTF-8');
    $password = htmlentities($_POST["password"], ENT_QUOTES, 'UTF-8');

    require_once "../classes/user.php";
    require_once "../classes/userController.php";
    require_once "../classes/userService.php";

    $user = User::createUserForLogin($username, $password);
    $userController = new UserController($user);

    $result = $userController->login();
    echo json_encode($result);

    exit();
}

echo "You are not AJAX request &#9785;";



