<?php

class UserService {

    private $dbPath;
    private $dbData;

    public function __construct($dbPath = "/database/db.json") {
        $this->dbPath = $_SERVER['DOCUMENT_ROOT'] . $dbPath;
        $this->dbData = $this->getUsers();
    }

    private function getUsers() {
        return json_decode($this->getFileContent());
    }

    public function getUser($username) {
        foreach ($this->dbData->users as $user) {
            if ($user->username === $username) {
                return $user;
            }
        }
        return false;
    }

    public function addUser(User $user) {
        $passwordSalt = mt_rand(0, 100);
        $this->dbData->users[] = (object)[
            "username" => $user->getUsername(),
            "password" => $this->hashPassword($passwordSalt, $user->getPassword()),
            "email"    => $user->getEmail(),
            "name"     => $user->getName(),
            "salt"     => $passwordSalt,
            "cookie"   => ""
        ];
        $this->putJson();
    }

    public function updateCookie($username, $cookie) {
        $user = $this->getUser($username);
        if ($user) {
            $user->cookie = $cookie;
            $this->putJson();
        }
    }

    public function comparePasswords($username, $password) {
        $user = $this->getUser($username);
        if ($user) {
            $passwordHash = $this->hashPassword($user->salt, $password);
            return $passwordHash === $user->password;
        }
        return false;
    }

    public function checkUniqueField($field, $value) {
        foreach ($this->dbData->users as $user) {
            if ($user->$field === $value) {
                return false;
            }
        }
        return true;
    }

    private function getFileContent() {
        return file_get_contents($this->dbPath);
    }

    private function putJson()
    {
        file_put_contents($this->dbPath, json_encode($this->dbData, JSON_PRETTY_PRINT));
    }

    private function hashPassword($salt, $password) {
        return md5($salt . $password);
    }

}
