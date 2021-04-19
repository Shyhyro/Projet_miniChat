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
        try {
            $stmt = DB::getInstance()->prepare("SELECT * FROM minichat.user  WHERE username = '$username' LIMIT 1", User::class);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $username;
    }

}