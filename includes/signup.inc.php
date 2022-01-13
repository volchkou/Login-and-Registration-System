<?php

if ($_POST["request"] === "xmlhttprequest") {
    $username = htmlentities($_POST["username"], ENT_QUOTES, 'UTF-8');
    $password = htmlentities($_POST["password"], ENT_QUOTES, 'UTF-8');
    $passwordRepeat = htmlentities($_POST["passwordRepeat"], ENT_QUOTES, 'UTF-8');
    $email = htmlentities($_POST["email"], ENT_QUOTES, 'UTF-8');
    $name = htmlentities($_POST["name"], ENT_QUOTES, 'UTF-8');

    require_once "../classes/user.php";
    require_once "../classes/userController.php";
    require_once "../classes/userService.php";

    $user = User::createUserForSignup($username, $password, $passwordRepeat, $email, $name);
    $userController = new UserController($user);

    $result = $userController->signup();
    echo json_encode($result);

    exit();
}

echo "You are not AJAX request &#9785;";


