<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/require.php";

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$manager = new MessageController();

switch($requestType) {
    case "POST":
        $data = json_decode(file_get_contents('php://input'));
        if(isset($_SESSION['id'])) {
            $user_fk = $_SESSION['id'];
            $manager->addMessage($user_fk, addslashes($data->content));
        }
        break;
    case "GET":
        echo getMessage($manager);
        break;
    default:
        break;
}

/* Get message */
function getMessage($manager) {
    $reponse = [];

    foreach ($manager->getMessage() as $message) {
        $reponse[] = [
            "content" => str_replace("\\", "", $message->getMessage()),
            "date" => $message->getDate(),
            "user" => $message->getUser_id(),
        ];
    }
    return json_encode($reponse);
}