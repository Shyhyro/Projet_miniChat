<?php
require_once "require.php";

if (isset($_GET['error'], $_SESSION['username'], $_POST['message']) && $_GET['error'] === "0") {
    $username = strip_tags(trim($_SESSION['id']));
    $new_message = strip_tags(trim($_POST['message']));

    $n_message = new MessageController();
    $n_message = $n_message->addMessage($username, $new_message);

    header("location: ./view/chat.php");

} else {
    header("location: ./view/chat.php?error=2");
}
