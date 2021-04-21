<?php
require_once "require.php";

if(isset($_GET['error'], $_POST['username'], $_POST['password']) && $_GET['error'] === "0") {
    $username = strip_tags(trim($_POST['username']));
    $password = strip_tags(trim($_POST['password']));

    /**
     * Check if information of login is correct and creat a session for the user
     * @param string $username
     * @param string $password
     */
    function checkPassword(string $username, string $password) {
        $user = new UserController();

        if($user->logUser($username)) {
            if(password_verify($password, $user->logUser($username)->getPassword())) {
                $_SESSION['id'] = $user->logUser($username)->getId();
                $_SESSION['username'] = $user->logUser($username)->getUsername();
                header("location: ./view/chat.php");
            }
            else {
                header('location: ./view/index.php?error=2');
            }
        }
        else {
            header('location: ./view/index.php?error=1');
        }
    }

    checkPassword($username, $password);
}

//password_hash($password, PASSWORD_BCRYPT);