<?php

if (empty($_SESSION['login'])) {
    if (!empty($_COOKIE['username']) && !empty($_COOKIE['key'])) {
        $username = $_COOKIE['username'];
        $cookie = $_COOKIE['key'];

        require_once "classes/userService.php";
        $userService = new UserService("../database/db.json");
        $user = $userService->getUser($username);
        $userCookie = $user->cookie;

        if ($cookie === $userCookie) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $user->username;
            $_SESSION['name'] = $user->name;
        }
    }
}


