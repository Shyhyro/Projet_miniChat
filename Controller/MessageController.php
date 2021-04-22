<?php


class MessageController
{

    /*
     * Get all messages in DB
     */
    public function getMessage(): array {
        $array = [];
        $stmt = DB::getInstance()->prepare("SELECT * FROM message");

        if($stmt->execute()) {
            foreach ($stmt->fetchAll() as $message) {
                $userData = new UserController();
                $userFk = $userData->searchUser($message['user_id']);
                $array[] = new Message($message['id'], $userFk, $message['message'], $message['date'] );
            }
        }
        return $array;
    }

    /*
     * Add a new message in DB
     */
    public function addMessage($user_id, $message) :bool
    {
        $stmt = DB::getInstance()->prepare("INSERT INTO message (user_id, message) VALUES ('$user_id', '$message')");
        return $stmt->execute();
    }

}