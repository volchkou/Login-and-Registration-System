<?php

class UserController {

    private $user;
    private $userService;

    public function __construct(User $user) {
        $this->user = $user;
        $this->userService = new UserService();
    }

    public function login() {
        $result = $this->validateLogin();

        if ($result["hasMistakes"] === true) {
            return $result;
        }

        $this->createAuthInfo();
        return $result;
    }

    public function signup() {
        $result = $this->validateSignup();

        if ($result["hasMistakes"] === true) {
            return $result;
        }

        $this->userService->addUser($this->user);
        return $result;
    }

    private function validateLogin() {
        $usernameMistake = "";
        $passwordMistake = "";

        if ($this->userService->checkUniqueField("username", $this->user->getUsername())) {
            $usernameMistake = "No such user exists";
        }
        else if (!$this->userService->comparePasswords($this->user->getUsername(), $this->user->getPassword())) {
            $passwordMistake = "Incorrect password";
        }

        if ($usernameMistake !== "" || $passwordMistake !== "") {
            return array(
                "hasMistakes" => true,
                "mistakes" => array(
                    "username" => $usernameMistake,
                    "password" => $passwordMistake
                )
            );
        }

        return array(
            "hasMistakes" => false
        );
    }

    private function validateSignup() {
        $usernameMistake = "";
        $passwordMistake = "";
        $passwordRepeatMistake = "";
        $emailMistake = "";
        $nameMistake = "";

        if (!$this->checkUsername()) {
            $usernameMistake = "Username must be at least 6 characters long without spaces";
        }

        if (!$this->checkPassword()) {
            $passwordMistake = "Password must be at least 6 characters long and consist of letters and numbers";
        }

        if (!$this->checkPasswordRepeat()) {
            $passwordRepeatMistake = "Password mismatch";
        }

        if (!$this->checkEmail()) {
            $emailMistake = "Invalid email";
        }

        if (!$this->checkName()) {
            $nameMistake = "Name must be at least 2 characters long and consist of letters without spaces";
        }

        if (!$this->userService->checkUniqueField("username", $this->user->getUsername())) {
            $usernameMistake .= "Username is already taken";
        }

        if (!$this->userService->checkUniqueField("email", $this->user->getEmail())) {
            $emailMistake .= "Email is already taken";
        }

        if ($usernameMistake !== "" || $passwordMistake !== "" || $passwordRepeatMistake !== "" || $emailMistake !== "" || $nameMistake !== "") {
            return array(
                "hasMistakes" => true,
                "mistakes" => array(
                    "username" => $usernameMistake,
                    "password" => $passwordMistake,
                    "passwordRepeat" => $passwordRepeatMistake,
                    "email" => $emailMistake,
                    "name" => $nameMistake
                )
            );
        }

        return array(
            "hasMistakes" => false
        );
    }

    private function checkUsername() {
        $username = $this->user->getUsername();
        return preg_match("/^[A-Za-zА-я_\d]{6,}$/u", $username);
    }

    private function checkPassword() {
        return preg_match("/^(?=.*[A-z])(?=.*\d)[A-z\d]{6,}$/", $this->user->getPassword());
    }

    private function checkPasswordRepeat() {
        return $this->user->getPassword() === $this->user->getPasswordRepeat();
    }

    private function checkEmail() {
        return filter_var($this->user->getEmail(), FILTER_VALIDATE_EMAIL);
    }

    private function checkName() {
        return preg_match("/^[a-zA-ZА-я]{2,}$/u", $this->user->getName());
    }

    private function createAuthInfo() {
        $user = $this->userService->getUser($this->user->getUsername());

        session_start();
        $_SESSION["login"] = true;
        $_SESSION["username"] = $user->username;
        $_SESSION["name"] = $user->name;

        $cookie = $this->generateCookie();
        $cookieTime = time()+60*60*24*7; //one week

        $this->user->setCookie($cookie);
        $this->userService->updateCookie($this->user->getUsername(), $this->user->getCookie());

        setcookie('username', $this->user->getUsername(), $cookieTime, "/");
        setcookie('key', $cookie, $cookieTime, "/");
    }

    private function generateCookie() {
        $cookie = '';
        $length = 8;
        for ($i=0; $i<$length; $i++) {
            $cookie .= chr(mt_rand(33,126));
        }
        return md5($cookie);
    }
}