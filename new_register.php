<?php
require_once "require.php";

if(isset($_GET['error'], $_POST['username'], $_POST['password']) && $_GET['error'] === "0") {
    $username = strip_tags(trim($_POST['username']));
    $password = strip_tags(trim($_POST['password']));

    $user = new UserController();
    $user = $user->logUser($username);

    if($user->getId() == null) {
        $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $addUser = new UserController();
        $addUser = $addUser->addUser($username, $new_password);
        if ($addUser) {
            header("location: ./view/index.php?error=3");
        } else {
            header("location: ./view/register.php?error=2");
        }
    } else {
        header("location: ./view/register.php?error=1");
    }
} else {
    header("location: ./view/register.php?error=2");
}
