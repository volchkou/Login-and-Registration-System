<?php

if ($_POST["request"] === "xmlhttprequest") {
    $username = cleanData($_POST["username"]);
    $password = cleanData($_POST["password"]);
    $passwordRepeat = cleanData($_POST["passwordRepeat"]);
    $email = cleanData($_POST["email"]);
    $name = cleanData($_POST["name"]);

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

function cleanData($data) {
    return htmlentities($data, ENT_QUOTES, 'UTF-8');
}


