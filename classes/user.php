<?php

class User {
    private $username;
    private $password;
    private $passwordRepeat;
    private $email;
    private $name;
    private $cookie;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public static function createUserForLogin($username, $password) {
        return new User($username, $password);
    }

    public static function createUserForSignup($username, $password, $passwordRepeat, $email, $name) {
        $user = new User($username, $password);
        $user->passwordRepeat = $passwordRepeat;
        $user->email = $email;
        $user->name = $name;
        return $user;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getPasswordRepeat() {
        return $this->passwordRepeat;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function getCookie() {
        return $this->cookie;
    }

    public function setCookie($cookie) {
        $this->cookie = $cookie;
    }
}