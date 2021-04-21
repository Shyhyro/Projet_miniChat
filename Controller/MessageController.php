<?php


class MessageController
{

    public function getMessage(): array {
        $array = [];
        $stmt = DB::getInstance()->prepare("SELECT * FROM minichat.message");

        if($stmt->execute()) {
            foreach ($stmt->fetchAll() as $message) {
                $userData = new UserController();
                $userFk = $userData->searchUser($message['user_id']);
                $array[] = new Message($message['id'], $userFk, $message['message'], $message['date'] );
            }
        }
        return $array;
    }

    public function addMessage($username, $message) :bool
    {
        $stmt = DB::getInstance()->prepare("INSERT INTO minichat.message (user_id, message) VALUES ('$username', '$message')");
        return $stmt->execute();
    }

}