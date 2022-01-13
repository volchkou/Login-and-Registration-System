<?php

if ($_POST["request"] === "xmlhttprequest") {
    $username = cleanData($_POST["username"]);
    $password = cleanData($_POST["password"]);

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

function cleanData($data) {
    return htmlentities($data, ENT_QUOTES, 'UTF-8');
}



