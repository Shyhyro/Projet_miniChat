<?php

class UserController
{
    /**
     * Return result of data of user table
     * @return array
     */
    public function getUser(): array {
        return ObjectController::get("SELECT * FROM minichat.user", User::class);
    }

    /**
     * Search a User in table user
     * @param $username
     * @return object
     */
    public function logUser($username): object
    {
        $user = null;
        $stmt = DB::getInstance()->prepare("SELECT * FROM minichat.user  WHERE username = '$username' LIMIT 1");
        if($stmt->execute()) {
            $userData = $stmt->fetch();
            $user = new User($userData['id'], $userData['username'], $userData['password']);
        }
        return $user;
    }

    public function getMessage(): array {
        $array = [];
        $stmt = DB::getInstance()->prepare("SELECT * FROM minichat.message");

        if($stmt->execute()) {
            foreach ($stmt->fetchAll() as $message) {
                $array[] = new Message($message['id'], $message[''] );
            }
        }
        return $array;
    }
}

// [objet, objet, objet]
