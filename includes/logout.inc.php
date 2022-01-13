<?php

session_start();
session_destroy();
setcookie('username', '', time(), '/');
setcookie('key', '', time(), '/');
header('Location: ../index.php');

