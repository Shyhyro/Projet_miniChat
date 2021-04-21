<?php

class UserController
{

    /**
     * Search a User in table user
     * @param $username
     * @return User
     */
    public function logUser($username): ?User
    {
        $stmt = DB::getInstance()->prepare("SELECT * FROM minichat.user  WHERE username = '$username' LIMIT 1");
        $state = $stmt->execute();
        if($state) {
            $userData = $stmt->fetch();
            $user = new User($userData['id'], $userData['username'], $userData['password']);
        }
        else {
            $user = null;
        }
        return $user;
    }

    /**
     * Search a User in table user
     * @param $id
     * @return User
     */
    public function searchUser($id): ?User
    {
        $stmt = DB::getInstance()->prepare("SELECT * FROM minichat.user  WHERE id = '$id' LIMIT 1");
        $state = $stmt->execute();
        if($state) {
            $userData = $stmt->fetch();
            $user = new User($userData['id'], $userData['username'], $userData['password']);
        }
        else {
            $user = null;
        }
        return $user;
    }

    public function addUser($username, $password) :bool
    {
        $stmt = DB::getInstance()->prepare("INSERT INTO minichat.user (username, password) VALUES ('$username', '$password')");
        return $stmt->execute();
    }

}
